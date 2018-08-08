function onFileSelect(e) {
    var
        f = e.target.files[0], // Первый выбранный файл
        reader = new FileReader,
        place = document.getElementById("previewImg") // Сюда покажем картинку
    ;
    reader.readAsDataURL(f);
    reader.onload = function (e) { // Как только картинка загрузится
        place.src = e.target.result;
        $('#previewImg').css('border', '5px solid #216a94')
    }
}

if (window.File && window.FileReader && window.FileList && window.Blob) {
    document.querySelector("input[type=file]").addEventListener("change", onFileSelect, false);
} else {
    console.warn("Ваш браузер не поддерживает FileAPI")
}