<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .calendar ul li{
            width: calc(100%/7);
            position: relative;
        }
        .calendar .days li{
            cursor: pointer;
            margin-top: 30px;
            z-index: 1;
        }
        .calendar .days li::before{
            position: absolute;
            content: "";
            height: 40px;
            width: 40px;
            top: 50%;
            left: 50%;
            z-index: -1;
            transform: translate(-50%, -50%);
            border-radius: 50%;
        }
        .days li:hover::before{
            background: #f2f2f2;
            z-index: -1;
        }
        .days li.inactive{
            color: #aaa;
        }
        .days li.active{
            color: #fff;
        }
        .days  li.active::before{
            background: rgb(0, 66, 146);

        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-blue-900">
    <div class="wrapper w-[450px] bg-[#fff] rounded-lg">
        <header class="flex items-center justify-between p-4">
            <p class="current-date text-[1.45rem] font-[500]"></p>  {{--current-date class--}}
            <div class="icons flex gap-2">
                <span id="prev" class="w-[38px] h-[38px] hover:bg-slate-300 cursor-pointer flex items-center justify-center bg-slate-100 rounded-full"><i class="fa-solid fa-chevron-left"></i></span>
                <span id="next" class="w-[38px] h-[38px] hover:bg-slate-300 cursor-pointer flex items-center justify-center bg-slate-100 rounded-full"><i class="fa-solid fa-chevron-right"></i></span>
            </div>
        </header>
        <div class="calendar p-[20px]">
            <ul class="weeks flex flex-wrap text-center font-semibold">
                <li>Sun</li>
                <li>Mon</li>
                <li>Tue</li>
                <li>Wed</li>
                <li>Thu</li>
                <li>Fri</li>
                <li>Sat</li>
            </ul>
            <ul class="days flex flex-wrap text-center mb-[20px]">

            </ul>
        </div>
    </div>
    <script>
        const currentDate = document.querySelector(".current-date"),
        daysTag = document.querySelector(".days");
        const prevNextIcon = document.querySelectorAll(".icons span");

        let date = new Date(), //getting exact time date
        currYear = date.getFullYear(), // getting year
        currMonth = date.getMonth();

        console.log(currYear);

        const months = ["January", "February", "March", "April", "May", "June", "July",
                        "August", "September", "October", "November", "December"];

        const renderCalender = () => {

            let lastDateOfMonth = new Date(currYear, currMonth + 1, 0).getDate(),
            lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate()//getting the last date method , to get first +1 should removed and last attribute should be 1
            let firstDayOfMonth = new Date(currYear, currMonth, 1).getDay(),
            lastDayOfMonth = new Date(currYear, currMonth,lastDateOfMonth).getDay();
            let liTag = "";
            console.log(lastDateofLastMonth);

            for (let i = firstDayOfMonth; i > 0; i--) { //prev month days
                liTag += `<li class="inactive">${lastDateofLastMonth - i +1}</li>`;
            }

            for (let i = 1; i <= lastDateOfMonth; i++) { // all current month dates

                let isToday  = i === date.getDate() && currMonth === new Date().getMonth() && currYear
                                === new Date().getFullYear() ? "active" : "";
                liTag += `<li class=${isToday}>${i}</li>`;
            }

            for (let i = lastDayOfMonth; i < 6; i++) {  //next month first days
                liTag += `<li class="inactive">${i - lastDayOfMonth + 1}</li>`;
            }

            currentDate.innerText = `${months[currMonth]} ${currYear}`;
            daysTag.innerHTML = liTag;

        }
        renderCalender();

        prevNextIcon.forEach(icon => {
            icon.addEventListener("click", () =>{
                currMonth = icon.id === "prev" ? currMonth -1 : currMonth + 1;
                if(currMonth > 10){
                    prevNextIcon[1].classList.add("hidden");
                }
                else if(currMonth!=11){
                    prevNextIcon[1].classList.remove("hidden");
                }
                if(currMonth < 1){
                    prevNextIcon[0].classList.add("hidden");
                }
                else if(currMonth!=0){
                    prevNextIcon[0].classList.remove("hidden");
                }

                renderCalender();
            })
        });


    </script>
</body>
</html>
