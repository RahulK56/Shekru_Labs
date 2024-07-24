<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.quform').addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch('quform/contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            alert('An Ajax error occurred.');
            console.error('Error:', error);
        });
    });
});
</script>
