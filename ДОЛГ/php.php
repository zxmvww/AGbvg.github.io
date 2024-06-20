<?php
// Обрабатываем загруженный файл
if (isset($_FILES['file'])) {
  $errors = [];

  // Проверяем на ошибки
  if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    $errors[] = 'Ошибка загрузки файла.';
  }

  // Проверяем размер файла
  if ($_FILES['file']['size'] > 2097152) {  // 2 МБ
    $errors[] = 'Файл слишком большой.';
  }

  // Проверяем тип файла
  $allowed_mime_types = ['image/jpeg', 'image/png'];
  if (!in_array($_FILES['file']['type'], $allowed_mime_types)) {
    $errors[] = 'Неверный тип файла.';
  }

  // Если есть ошибки, выводим их
  if (!empty($errors)) {
    foreach ($errors as $error) {
      echo '<p>' . $error . '</p>';
    }
  } else {
    // Сохраняем файл
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

    // Выводим сообщение об успешной загрузке
    echo '<p>Файл загружен успешно.</p>';
  }
}
?>
