const form = document.getElementById('upload-form');

form.addEventListener('submit', (e) => {
  e.preventDefault();

  const formData = new FormData(form);

  fetch('upload.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    alert(data);
  })
  .catch(error => {
    alert('Произошла ошибка при загрузке файла.');
  });
});
