let dateh4 = document.querySelector('#date-jurnal-nav')
const date = new Date()

function monthsCalculation(months){
    switch (months) {
        case 1:
            return 'Gennaio'
        break;
        case 2:
            return 'Febbraio'
        break;
        case 3:
            return 'Marzo'
        break;
        case 4:
            return 'Aprile'
        break;
        case 5:
            return 'Maggio'
        break;
        case 6:
            return 'Giugno'
        break;
        case 7:
            return 'Luglio'
        break;
        case 8:
            return 'Agosto'
        break;
        case 9:
            return 'Settembre'
        break;
        case 10:
            return 'Ottobre'
        break;
        case 11:
            return 'Novembre'
        break;
        case 12:
            return 'Dicembre'
        break;
    }
}
function daysFormat(days){
    switch (days) {
        case 1:
            return 'Lunedi'
        break;
        case 2:
            return 'Martedi'
        break;
        case 3:
            return 'Mercoledi'
        break;
        case 4:
            return 'Giovedi'
        break;
        case 5:
            return 'Venerdi'
        break;
        case 6:
            return 'Sabato'
        break;
        case 7:
            return 'Domenica'
        break;
    }
}
function formatDate(date){
    let days = date.getDate()
    let months = date.getMonth() + 1
    let years = date.getFullYear()

    return ` ${daysFormat(date.getDay())} ${days}, ${monthsCalculation(months)}  ${years}`
}

dateh4.innerHTML = formatDate(date)

let searchBtn = document.querySelector('#search-btn')
let searchBar = document.querySelector('#search-bar')
let welcome = document.querySelector('#welcome')
let searchBtnNone = document.querySelector('#search-btn-none')

searchBtn.addEventListener('click', ()=>{
    searchBtn.classList.toggle('d-none')
    searchBar.classList.toggle('d-none')
    searchBtnNone.classList.toggle('d-none')
    welcome.classList.toggle('d-none')
})