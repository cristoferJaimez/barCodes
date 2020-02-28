<script>
function print() {
    window.print();
}

 // buscador

                    function search() {

                        const buscar = document.querySelector("#formulario");          
                        
                            let text = buscar.value; 
                           
                            console.log(text);
                            let parametro = {
                                "text" : text
                                
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

                
</script>