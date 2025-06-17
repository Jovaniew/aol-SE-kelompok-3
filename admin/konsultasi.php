<?php
include '../koneksi.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['admin'])) {
    echo "<script> alert('Anda belum login');</script>";
    echo "<script> location ='login.php';</script>";
}

// Ambil ID Pengguna dan ID Pengacara
$idpengacara = $_SESSION['admin']['id'];
$iduser = $_GET['id']; // ID pengguna yang ingin dikonsultasikan

// Ambil informasi pengguna
$query = $koneksi->query("SELECT * FROM pengguna WHERE id = '$iduser'");
$pecah = $query->fetch_assoc();

if (!$pecah) {
    echo "<script> alert('Pengguna tidak ditemukan');</script>";
    echo "<script> location ='data_member.php';</script>";
}
?>

<!-- Halaman Konsultasi -->
<div class="container py-1">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Konsultasi dengan <?= htmlspecialchars($pecah['nama']); ?></h5>
                    <a href="data_member.php" class="btn btn-sm btn-light">Kembali</a>
                </div>
                <div class="card-body bg-light">
                    <div id="chat-box" class="bg-white p-3 rounded shadow-sm mb-3" style="height: 300px; overflow-y: scroll;">
                        <!-- Pesan chat akan ditampilkan di sini -->
                    </div>

                    <form id="chat-form" enctype="multipart/form-data">
                        <input type="hidden" name="idpengguna" value="<?= $iduser; ?>">
                        <input type="hidden" name="idpengacara" value="<?= $idpengacara; ?>">
                        <div class="mb-2">
                            <textarea class="form-control" name="message" rows="3" placeholder="Ketik pesan..."></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="input-group" style="max-width: 70%;">
                                <input type="file" name="image" class="form-control" id="inputGroupFile">
                                <label class="input-group-text" for="inputGroupFile">
                                    <i class="bi bi-paperclip"></i>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-send-fill"></i> Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script AJAX untuk chat -->
<script>
    $(document).ready(function() {
        // Flag untuk menentukan apakah harus scroll otomatis ke bawah
        var autoScroll = true;
        var lastScrollTop = 0;

        // Deteksi jika pengguna melakukan scroll manual
        $('#chat-box').on('scroll', function() {
            var scrollTop = $(this).scrollTop();
            var scrollHeight = $(this)[0].scrollHeight;
            var clientHeight = $(this)[0].clientHeight;

            // Jika user scroll ke atas, matikan auto scroll
            if (scrollTop < lastScrollTop) {
                autoScroll = false;
            }

            // Jika user scroll ke paling bawah, aktifkan auto scroll
            if (scrollTop + clientHeight >= scrollHeight - 50) {
                autoScroll = true;
            }

            lastScrollTop = scrollTop;
        });

        function loadMessages() {
            var idpengguna = <?= $iduser; ?>;
            var idpengacara = <?= $idpengacara; ?>;
            $.ajax({
                url: 'ambil_pesan.php', // Endpoint untuk mengambil pesan
                type: 'GET',
                data: {
                    idpengguna: idpengguna,
                    idpengacara: idpengacara
                },
                success: function(response) {
                    var chats = JSON.parse(response);
                    $('#chat-box').html('');
                    chats.forEach(function(chat) {
                        var messageClass = chat.from_user_id == idpengguna ? 'sent' : 'received';
                        var isClient = chat.from_user_id == idpengguna;

                        // Create message with bootstrap styling
                        var messageHtml = '<div class="message d-flex ' + (isClient ? 'justify-content-start' : 'justify-content-end') + ' mb-3">';
                        messageHtml += '<div class="' + (isClient ? 'bg-light' : 'bg-primary text-white') + ' py-2 px-3 rounded-3" style="max-width: 75%;">';

                        // Add sender indicator
                        messageHtml += '<div class="small mb-1 ' + (isClient ? 'text-muted' : 'text-white') + '">';
                        messageHtml += isClient ? '<?= htmlspecialchars($pecah['nama']); ?>' : 'Anda (Admin)';
                        messageHtml += '</div>';

                        // Message content
                        messageHtml += '<p class="mb-1">' + chat.kirimpesan.replace(/\n/g, '<br>') + '</p>';

                        // Image if exists
                        if (chat.gambar) {
                            messageHtml += '<div class="mt-2 text-center">';
                            messageHtml += '<a href="' + chat.gambar + '" target="_blank">';
                            messageHtml += '<img src="' + chat.gambar + '" class="img-fluid rounded" style="max-width: 100%; max-height: 200px;"/>';
                            messageHtml += '</a></div>';
                        }

                        // Timestamp
                        messageHtml += '<div class="text-end small ' + (isClient ? 'text-muted' : 'text-white') + '">';
                        messageHtml += '<small>' + new Date(chat.timestamp).toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit'
                        }) + '</small>';
                        messageHtml += '</div></div></div>';

                        $('#chat-box').append(messageHtml);
                    });

                    // Scroll to bottom only if autoScroll is true
                    if (autoScroll) {
                        $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
                    }
                },
                error: function() {
                    console.log('Terjadi kesalahan dalam mengambil pesan.');
                }
            });
        }

        setInterval(loadMessages, 2000); // Memuat pesan setiap 2 detik

        $('#chat-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var messageText = $('textarea[name="message"]').val();

            // Reset autoScroll to true when sending a new message
            autoScroll = true;

            $.ajax({
                url: 'kirim_pesan.php', // Endpoint untuk mengirim pesan
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // We won't add HTML directly here as it will be handled by loadMessages()
                    // Just clear the form
                    $('textarea[name="message"]').val('');
                    $('input[name="image"]').val('');
                },
                error: function() {
                    alert('Terjadi kesalahan dalam mengirim pesan.');
                }
            });
        });

        // Initial load and scrolling
        loadMessages();
        setTimeout(function() {
            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
        }, 500);
    });
</script>

<style>
    /* Just adding a minimal style for better message bubble appearance */
    .message {
        word-wrap: break-word;
    }

    #chat-box::-webkit-scrollbar {
        width: 6px;
    }

    #chat-box::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    #chat-box::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }
</style>