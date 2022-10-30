window.onload = () => {
    let vote = document.querySelector("#vote")
    console.log(vote)

    let index = document.querySelector("#index")
    console.log(index)
    let dataAtribut = index.getAttribute("data-vote")
    console.log(dataAtribut)
    vote.addEventListener('click', e => {
        e.preventDefault();
    let counter = async()=>{
        try {
            let response = await fetch('/voting')
            console.log(response)
            // if(response){
            //
            // }
        }
        catch (error){
            console.log(error)
        }
    }

    })
}
