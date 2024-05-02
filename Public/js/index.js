function openMenu(){
    document.querySelector('.menu-hidden').classList.toggle('menu-active')
}

window.addEventListener('resize', closeMenu)

function closeMenu(){
    if(window.innerWidth > 520){
        document.querySelector('.menu-hidden').classList.remove('menu-active')
    }
}

// //função para renderizar uma view sem recarregar a página atual

// async function getView(view){
//     try{
//         const response = await fetch('/' + view.toLowerCase())
//         if(response.ok){
//             const view = await response.text()
//             showView(view)
//         }

//     }catch(e){
//         console.log(e)
//     }
// }

// function showView(view){
//     document.querySelector('body').append(view)
// }