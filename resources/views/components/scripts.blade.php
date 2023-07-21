<script>
        function updateNameInput() {
            const fileInput = document.getElementById('file');
            const nameInput = document.getElementById('name');
            const fileName = fileInput.files[0].name;
            nameInput.value = fileName;
        }
    </script>

    <script>
        document.getElementById('icon').addEventListener('click', function(e) {
            document.getElementById('file').click();
        })
        document.getElementById('file').addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                document.getElementById('icon').src = URL.createObjectURL(this.files[0]);
            }
        });
    </script>