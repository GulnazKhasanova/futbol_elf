window.onload = () => {
    let votingform = document.querySelector("#votingform")
    let vote = document.querySelector("#vote")
    let index = document.querySelector('#id')
    votingform.addEventListener('click', e => {
        let target = (e.target)

        let counter = async(idNews)=>{

            try {
                let response = await fetch('/voting/${idNews}')
                if (!response.ok) {
                    throw new Error('Ответ сервера не в диапазоне 200-299');
                }
                let voRes = await response.text()

                return voRes

            }
            catch(e) {
                console.error(e)
            }
        }
        if (target.getAttribute('id') === 'vote'){
            e.preventDefault();
            vote.disabled = true
            let res = counter(index)
                console.log(res)
        }

    })
}
