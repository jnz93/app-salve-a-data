(function () {
    console.log(dia,mes,ano);
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;
        month = day * 30;

    //I'm adding this section so I don't have to keep updating this pen every year :-)
    //remove this if you don't need it
    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = ano,
        nextYear = yyyy + 1,
        dayMonth = mes + "/" + dia + "/",
        birthday = dayMonth + yyyy;
        console.log(birthday);
   // today = mm + "/" + dd + "/" + yyyy;
    if (today > birthday) {
        birthday = dayMonth + nextYear;
    }
    console.log(today);
    console.log(today);
    //end

    const countDown = new Date(birthday).getTime(),
        x = setInterval(function () {

            const now = new Date().getTime(),
                distance = countDown - now;
               // console.log(distance);
               var faltaMeses = Math.floor(distance / (month));
               if(faltaMeses > 0){
                $(".meses").html(faltaMeses);
                $(".dias").html(Math.floor((distance % (month)) / (day)));
               }else{
                $(".meses").html(0);
                $(".dias").html(Math.floor(distance / (day)));
               }
               $(".horas").html(Math.floor((distance % (day)) / (hour)));
               $(".minutos").html(Math.floor((distance % (hour)) / (minute)));
               $(".segundos").html(Math.floor((distance % (minute)) / second));
            //do something later when date is reached
            if (distance < 0) {
                document.getElementById("headlineClock").innerText = textoHoje;
                document.getElementById("countdown").style.display = "none";
                document.getElementById("content").style.display = "block";
                clearInterval(x);
            }
            //seconds
        }, 0)
}());
