function mostrarMenu(num)
{  
     if(num==1)
    {
        document.getElementById('Administrador').style.display='block';
    }
    else if(num==2)
    {
        document.getElementById('Profesor').style.display='block';
    }
    else if(num==3)
    {
        document.getElementById('Estudiante').style.display='block';
    }
    else{
        document.getElementById('Invitado').style.display='block';
    }
}

function mostrarSocial() 
{
    var x = document.getElementById("Social");
    if (x.style.display === "none") 
    {
        x.style.display = "block";
    } else 
    {
        x.style.display = "none";
    }
}


function MostrarImg()
{
    document.getElementById('Evid').style.display='block';
}

    
    
    
    
