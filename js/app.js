
function print() {
    window.print();
}

 // buscador

                    function search() {

                        const buscar = document.querySelector("#formulario");   
                        const pag = document.querySelector("#pag");        
                        
                            let text = buscar.value;
                            let pa = pag.value; 
                            
                            console.log(text);
                            let parametro = {
                                "text" : text,
                                "pag"  : pa
                                
                            };

                            $.ajax({
                                data: parametro,
                                url:  "./php/search.php",
                                type: "GET",
                                success: function (response) {
                                    $("#searching").html(response);
                                }
                            });

      
                        
                    }

                