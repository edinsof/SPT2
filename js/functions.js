/*
//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia 
*/

//Get Search Query Parameters from url in address bar
function GetAddressURLParameters(paraName)
{
    var url = window.location.search.substring(1);
    var urlsearchpart = url.split('&');
    for (var i = 0; i < urlsearchpart.length; i++)
    {
        var params = urlsearchpart[i].split('=');
        if (params[0] == paraName)
        {
            return params[1];
        }
    }
}

