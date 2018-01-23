/**
 * Created by Recreational on 2/4/2017.
 */
function SendVideoData(){
    var videoCheck = new CheckVideo();
    videoCheck.SendData({name : $("video")[0].currentSrc});
}

function CheckVideo(){
    //Send the data to the server
    this.SendData = function(dataArray){
        return sendData(dataArray);
    };
    sendData = function(dataArray){
        $.post('/public_library/public_scripts/addVideoToDatabase.php', dataArray, function(returnedData){
            console.log("Returned data: " + returnedData);
        });
    }
}