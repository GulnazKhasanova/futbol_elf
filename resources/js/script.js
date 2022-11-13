window.onload = () => {

    let vote = document.querySelector("#vote")
    let votingform = document.querySelector("#votingform")
    let index = vote.previousSibling.previousSibling
    let alertPlaceholder = document.querySelector('#alr')

    function alert(message, type) {
        let wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

        alertPlaceholder.append(wrapper)
    }
    let counter = async(id)=>{
        try {
            let response = await fetch(`/voting/${id}`)
            if (!response.ok) {
                throw new Error('Ответ сервера не в диапазоне 200-299');
            }
            let voRes = await response.json()
            return voRes
        }
        catch(e) {
            console.error(e)
        }
    }
    if (document.readyState === "complete") {
        (async () =>{
            let str = await counter(index.getAttribute('id'))
            let newStr = str
            let tr = newStr.trim()
            console.log(tr.split(' '))
            if( tr.split(' ') >= 10){
                vote.disabled = true;
                alert('Голосование закрыто!', 'danger')
            } else if( newStr == 'no'){
                vote.disabled = true;
                // let alertTrigger = document.getElementById('liveAlertBtn')
                alert('Вы уже проголосовали!', 'warning')
            } else if(newStr == 'off'){
                vote.disabled = true;
                // сообщить что голосование завершено
                alert('Голосование завершилось!', 'primary')
            } else if(newStr == 'close'){
                // скрыть кнопку
                vote.style.display = 'none'
            }
        })();
    }


    votingform.addEventListener("click", e => {
        e.preventDefault();
        let tar = e.target
        let prev = tar.previousSibling.previousSibling

        if (prev.getAttribute('name') === 'id') {
            let id = prev.getAttribute('id')
            vote.disabled = true;
            (async () =>{
                let str = await counter(id)
                let newStr = str
                let tr = newStr.trim()
                console.log(tr.split(' '))
                if( tr.split(' ') >= 10){
                    vote.disabled = true;
                    alert('Голосование закрыто!', 'danger')
                } else if( newStr == 'no'){
                    console.log(1)
                    console.log(alertPlaceholder)
                    vote.disabled = true;
                    // let alertTrigger = document.getElementById('liveAlertBtn')
                    alert('Вы уже проголосовали!', 'warning')
                } else if(newStr.includes(id)){
                    console.log(2)
                    alert('Вы успешно проголосовали!', 'success')
                }
            })();
            // (async () =>{console.log(await counter(id))})()
        }
    })
    Echo.private(`account`)
        .listen('VoteClose', (e) => {
            console.log(e);
            vote.style.display = 'none'
        });


}
