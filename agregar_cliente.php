<?php
                
                include ('conexion.php');
                $nombre = $_REQUEST['NOMBRE'];
                                               $apellido = $_REQUEST['APELLIDO'];
                                               $telefono = $_REQUEST ['TELEFONO'];
                                               $facebook = $_REQUEST['FACEBOOK'];
                                                $rutalocal = "images";
                                                $rutatemporal = $_FILES['imagen']['tmp_name'];
                                               $nombreimagen = $_FILES['imagen']['name'];
                                               $rutadestino = $rutalocal.'/'.$nombreimagen;
                                                move_uploaded_file($rutatemporal,$rutadestino);
                    
                                                 mysql_query ("INSERT INTO `Cliente` (`ID_Cliente`,`Nombre`,`Apellido`,`Telefono`,`Facebook`,`Url_Img`) VALUES (NULL,'$nombre','$apellido','$telefono','$facebook','$rutadestino')") or die (mysql_error());
                        
                         echo "<script type = 'text/javascript'>
                                                        window.alert('Cliente Agregado Correctamente');
                                                     </script>";
                                                     
                                                     
                                                      echo '<meta http-equiv="refresh" content="0;url=cliente.php">'; 
                        
?>
               
               
               
               
               
               
               
               
               
                
                



