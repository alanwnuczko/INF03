/* const ukryjPierwszy=()=>{
        cytat1.style.display="none";
        cytat2.style.display="block";
    }
    const ukryjDrugi=()=>{
        cytat2.style.display="none";
        cytat3.style.display="block";
    }
    const ukryjTrzeci=()=>{
        cytat3.style.display="none";
        cytat1.style.display="block";
    } */

function cytaty(clickedId)
{
    const cytat1 = document.getElementById('cytat1');
    const cytat2 = document.getElementById('cytat2');
    const cytat3 = document.getElementById('cytat3');

    if (clickedId === 'cytat1')
    {
        cytat1.style.display = "none";
        cytat2.style.display = "block";
    }
    else if (clickedId === 'cytat2')
    {
        cytat2.style.display = "none";
        cytat3.style.display = "block";
    }
    else if (clickedId === 'cytat3')
    {
        cytat3.style.display = "none";
        cytat1.style.display = "block";
    }
}

document.getElementById('cytat1').addEventListener('click', function(){
    cytaty('cytat1');
});
document.getElementById('cytat2').addEventListener('click', function(){
    cytaty('cytat2');
});
document.getElementById('cytat3').addEventListener('click', function(){
    cytaty('cytat3');
});