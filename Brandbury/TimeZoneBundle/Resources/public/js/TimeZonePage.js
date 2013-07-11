Brandbury.TimeZonePage = function()
{
    var timeZoneInfoUrl = '/timezone/';    
    var sender = this;
    
    sender.init = function()
    {
        // получить смещение для данного часового пояса
        var date = new Date();        
        // запросить у сервера информацию по часовому поясу
        var url = timeZoneInfoUrl + (-1) * date.getTimezoneOffset() / 60;
        // send ajax query
        jQuery.get(url, sender.getTimeZoneInfoHandler);
    }
    
    sender.getTimeZoneInfoHandler = function(data)
    {
        jQuery('#timeZoneInfoContainer').html(data);
    }
    
    jQuery(sender.init);
}

var timeZonePage = new Brandbury.TimeZonePage();

