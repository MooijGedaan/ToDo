function sendUpdate(id) {
    console.log(id);
    $.ajax({
        type: 'POST',
        url: "api/checktask.php?id=" + id,

        success: function (data) {
            if (data) {
                console.log('success');
                console.log(data);
            }
        }
    });
}