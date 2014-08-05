<html>
                <head>
                        <title>Clientes</title>
                </head>
        <body>
                <form action='cliente.php' method='post' enctype='multiform/form-data'>
                        <input type='hidden' name='case' value='1'>
                        <input type='submit' name ='submit' value='Ver Clientes'>
                </form>
                <form action='cliente.php' method='post'>
                        <input type = 'hidden' name = 'case' value='2'>
                        <input type = 'submit' name = 'submit' value = 'Agregar Cliente'>        
                </form>
                
        </body>        
</html>
<?php
                ;
                
                if (isset($_REQUEST['case'])) {
                        include('conexion.php');
                        include ('style.css');
                        $case = $_REQUEST['case'];
                
                switch($case){
                        
                        case '1':
                                
                                $query = mysql_query("SELECT Nombre, Apellido, Telefono, Url_Img, Facebook FROM Cliente")or die (mysql_error());
                                
                                        
                                echo "<div class = 'datagrid'>
                                                <table>
                                                   <thead>
                                                        <tr>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Telefono</th>
                                                        <th>Facebook</th>
                                                        <th>Imagen</th>
                                                        </tr>
                                                   </thead>
                                                   <tbody>";
                                        
                                        while($row=mysql_fetch_array($query)){
                                                
                                                echo "<tr>";
                                                echo "<td>".$row['Nombre']."</td>";
                                                echo "<td>".$row['Apellido']."</td>";
                                                echo "<td>".$row['Telefono']."</td>";
                                                echo "<td>".$row['Facebook']."</td>";?>
                                                <td><img src = "<?php echo $row['Url_Img'];?>" width = '50' height ='50'></td>
                                        
                                                <?php
                                                
                                                echo "</tr>";
                                               
                                                
                                        }
                                        
                                        echo "</tbody>
                                              </table>
                                              </div>";
                                              
                        break;
                
                
                
                        case '2':
                                
?>  
                                
                                        <html>
                                                <head>
                                                        <title>Cliente-Agregar Cliente</title>
                                                </head>
                                                <body>
                                                        <form action = 'agregar_cliente.php' method = 'post' enctype='multipart/form-data'>
                                                                Nombre     <input type = 'text' name = 'NOMBRE'><br>
                                                                Apellido   <input type = 'text' name = 'APELLIDO'><br>
                                                                Telefono   <input type = 'text' name = 'TELEFONO'><br>
                                                                Facebook   <input type = 'text' name = 'FACEBOOK'><br>
                                                                            <input type = 'file' name='imagen'> 
                                                                            <input type = 'submit' name = 'submit' value = 'Agregar'>
                                                        </form>
                                                </body>
                                        </html>   
                        
               
<?php
               
                                      
                                        
                                        break;
                                
                                default:
                                        
                                        echo "";
                                        
                                        break;
               
                }
                
                }
?>
               
               
               
               
               
               
               
               
               
                
                



