Date.prototype.getDOY = function() {
    var onejan = new Date(this.getFullYear(),0,1);
    return Math.ceil((this - onejan) / 86400000);
}

function getCurDayOfYear()
{
    var now = new Date();
    var start = new Date(now.getFullYear(), 0, 0);
    var diff = now - start;
    var oneDay = 1000 * 60 * 60 * 24;
    var day = Math.floor(diff / oneDay);
    return day;
}

function calculate_age(bmonth, bday, byear)
{
    var date = new Date();
    var cyear = date.getFullYear();
    var cmonth = parseInt(date.getMonth()) + 1;
    var year;

    var daytoday = getCurDayOfYear();

    var dmonth = bmonth - 1;
    var countd = new Date(byear,dmonth,bday);
    var daynum = countd.getDOY();

    var bdate = bmonth+'/'+bday+'/'+byear;
   
    year = cyear - 1;
    total1 = year - byear;
    total2 = (12 - bmonth) + cmonth;
    total3 = total2 / 12;

    var age1 = (total1 + total3);
    var age2 = Math.round(age1 * 100) / 100;
    var age = Math.floor(age2); 
    var months1 = age * 12;
    var months = Math.round(months1 * 100) / 100;

    return (daynum <= daytoday) ? age : age - 1;
}