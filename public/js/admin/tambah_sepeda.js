document.getElementById('gambarInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewGambar');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.classList.add('hidden');
            }
        });

        // Preview gambar sebelum upload
document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("gambarInput");
    const preview = document.getElementById("previewGambar");

    if (input) {
        input.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove("hidden");
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.classList.add("hidden");
            }
        });
    }
});
