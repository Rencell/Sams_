function formatDateTime() {

    
    const now = new Date();

    
    let hours = now.getHours();
    
    const minutes = now.getMinutes().toString().padStart(2, '0');
   
    
    const ampm = hours >= 12 ? 'PM' : 'AM';

   
    hours = hours % 12;
    hours = hours ? hours : 12; 

    
    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const dayName = days[now.getDay()];

    const day = now.getDate().toString().padStart(2, '0');
    const year = now.getFullYear();
    const formattedTime = `${hours}:${minutes}${ampm}`;
    
    const formattedDate = `${dayName} ${day}, ${year}`;
    $('#current_time').text(formattedTime);
    $('#current_date').text(formattedDate);
    
    
}

formatDateTime();
