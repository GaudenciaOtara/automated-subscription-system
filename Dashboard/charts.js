 
    let myChart=document.getElementById('myChart').getContext('2d');


    let barChart=new Chart(myChart, {
    
    type:'line',  
    // bar, horizontal,pie,line,doughnut,radar,polarArea
    data:{
    labels:['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
    datasets:[{
    label:'New Businesses(This Week)',
    data:[
    10,
    20,
    50,
    3,
    45,
    66,
    78
    ],
    backgroundColor:"#15a362",
    color:"#15a362",
	borderColor: "rgba(117,193,129, 0.8)", 


    }]
    },
    options:{},
    
    });
 
 
    let pieChart=document.getElementById('pieChart').getContext('2d');


    let newbarChart=new Chart(pieChart, {
    
    type:'pie',  
    // bar, horizontal,pie,line,doughnut,radar,polarArea
    data:{
    labels:['MPESA','Credit Card','Paypal'],
    datasets:[{
    label:'Payment Methods',
    data:[
    60,
    10,
    9
    ],
    backgroundColor:[
        "#15a362", 
         "#B56727", 
         "#6fbbd3", 
    ],
	// borderColor: "rgba(117,193,129, 0.8)", 
   
    color:'#15a362'
    }]
    },
    options:{},
    
    });


