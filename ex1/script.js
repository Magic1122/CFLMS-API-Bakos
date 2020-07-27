console.log('JS is running...')

$(document).ready(() => {

    $('#serri').click((e) => {

        $.ajax({
            type: "GET",
            url: `http://api.serri.codefactory.live/random/`,
    
    
            dataType: "json",
            success: (response) => {
                console.log(response)
            }
        })
    })

})
