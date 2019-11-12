$('select[name=platform_id]').on('change', (evt) => {
    let select = $(evt.target);
    if (select.val() == -1) {
        $('#addPlatform').removeClass('hide');
        $('#addPlatform input[type=text]').focus();
    }
});

$('#addPlatform .fade').on('click', function() {
    $('#addPlatform').addClass('hide');
    $('select[name=platform_id]').val('');
});

$('#addPlatform form').on('submit', (evt) => {
    evt.preventDefault();
    let form = $(evt.target);
    $.post({
        url: form.attr('action'),
        data: form.serialize(),
        success: function(data) {
            let jsonData = JSON.parse(data);
            if (!jsonData.inserted) {
                alert('The name can\'t be empty!');
                return;
            }
            let newOption = `<option value=${jsonData.id}>${jsonData.name}</option>`;
            $('select[name=platform_id] optgroup').append(newOption);
            $('#addPlatform').addClass('hide');
            $('select[name=platform_id]').val('');
        }
    })
});

$('#addGame').on('submit', evt => {
    evt.preventDefault();
    let form = $(evt.target);
    $.post({
        url: form.attr('action'),
        data: form.serialize(),
        success: data => {
            let jsonData = JSON.parse(data);
            if (!jsonData.inserted) {
                alert('You should fill the game name and its platform');
                return;
            }
            loadGames();
        }
    })
});

$('#games tbody').on('click', '.del-game', evt => {
    evt.preventDefault();
    let link = $(evt.target);
    if (!confirm(`Tem certeza que deseja excluir o jogo ${link.attr('data-game-name')}?`)) {
        return;
    }
    $.get({
        url: `removeGame.php?id=${link.attr('data-game-id')}`,
        success: data => {
            let jsonData = JSON.parse(data);
            if (!jsonData.removed) {
                alert('Ocorreu um erro, o dado não pôde ser excluído');
            }
            loadGames();
        }
    })
})

let loadGames = () => {
    $.get({
        url: 'listGames.php',
        success: data => {
            $('#games tbody').html(data);
        }
    });
}

$(document).ready(() => {
    loadGames();
})