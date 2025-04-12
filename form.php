<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Switcher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .container {
            max-width: 600px;
            margin-top: 30px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <img src="love.png" alt="Top Image" class="img-fluid">
        <button id="toggle-lang" class="btn btn-secondary mb-3"></button>
        <h1 id="heading"></h1>
        <form id="name-form" class="mt-3">
            <div class="mb-3">
                <label for="name" id="input-label" class="form-label"></label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <button type="submit" id="submit-btn" class="btn btn-primary"></button>
        </form>
        <div id="response" class="mt-3 alert alert-info d-none"></div>
    </div>

    <script>
        let lang = new URLSearchParams(window.location.search).get('lang') || 'en';

        const translations = {
            en: {
                heading: "Welcome",
                label: "Enter your name",
                button: "Submit",
                toggle: "Switch to Polish"
            },
            pl: {
                heading: "Witamy",
                label: "Wpisz swoje imię",
                button: "Zatwierdź",
                toggle: "Przełącz na angielski"
            }
        };

        function updateContent() {
            $('#heading').text(translations[lang].heading);
            $('#input-label').text(translations[lang].label);
            $('#submit-btn').text(translations[lang].button);
            $('#toggle-lang').text(translations[lang].toggle);
        }

        $('#toggle-lang').click(function() {
            lang = (lang === 'en') ? 'pl' : 'en';
            updateContent();
        });

        $('#name-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'process.php',
                data: {
                    name: $('#name').val()
                },
                success: function(response) {
                    $('#response').removeClass('d-none').text(response);
                }
            });
        });

        $(document).ready(function() {
            updateContent();
        });
    </script>
</body>

</html>