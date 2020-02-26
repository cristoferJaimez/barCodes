function print() {
    window.print();
}


        const buscar = document.querySelector("#formulario");

            const filtro = ()=>{
                 console.log(buscar.value);
            }

            buscar.addEventListener('keyup', filtro);

                
    