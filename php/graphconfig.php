<script>
let data1 = {
    labels: <?php echo json_encode($ope)?>,
    datasets: [{
    label: 'Consommation Totale (MWh)',
    data: <?php echo json_encode($consototale)?>,
    backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(99, 205, 86)'
    ],
    hoverOffset: 4
    }]
};

const config1 = {
  type: 'doughnut',
  data: data1,
};

const graph1 = new Chart(document.getElementById('graph1'),config1);
 
const DATA_COUNT = 11;
const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 1000000};

const labels = <?php echo json_encode($ann)?>;
const data2 = {
  labels: labels,
  datasets: [
    {
      label: 'Consommation Agricole',
      data: <?php echo json_encode($consoagri)?>,
      borderColor:  'rgb(99, 205, 86)',
      backgroundColor:  'rgba(99, 205, 86, 0.5)',
    },
    {
      label: 'Consommation Industrie',
      data: <?php echo json_encode($consoindus)?>,
      borderColor:  'rgb(54, 162, 235)',
      backgroundColor:  'rgba(54, 162, 235, 0.5)',
    },
    {
      label: 'Consommation Tertiaire',
      data: <?php echo json_encode($consoterti)?>,
      borderColor:  'rgb(255, 205, 86)',
      backgroundColor:  'rgba(255, 205, 86, 0.5)',
    },
    {
      label: 'Consommation Résidentitel',
      data: <?php echo json_encode($consoresi)?>,
      borderColor: 'rgb(255, 99, 132)',
      backgroundColor: 'rgba(255, 99, 132, 0.5)',     
    },
    {
      label: 'Consommation Secteur Inconnu',
      data: <?php echo json_encode($consosect)?>,
      borderColor:  'rgb(74, 82, 77)',
      backgroundColor:  'rgba(74, 82, 77, 0.5)',
    }
  ]
};

const config2 = {
  type: 'line',
  data: data2,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
    }
  },
};

const graph2 = new Chart(document.getElementById('graph2'), config2);



const labels3 = ['Thermique','Nucléaire','Eolien','Solaire','Hydraulique','Bioénergies'];
const data3 = {
  labels: labels3,
  datasets: [{
    label: "Production (MW)",
    data: <?php echo json_encode($donnees)?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.5)',
      'rgba(255, 205, 86, 0.5)',
      'rgba(255, 159, 64, 0.5)', 
      'rgba(75, 192, 192, 0.5)',
      'rgba(54, 162, 235, 0.5)',
      'rgba(153, 102, 255, 0.5)',
      'rgba(201, 203, 207, 0.5)'
    
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 205, 86)',
      'rgb(255, 159, 64)',   
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
      
    ],
    borderWidth: 1
  }]
};

const config3 = {
  type: 'bar',
  data: data3,
  options: {
    maintainAspectRatio: false,
        plugins: {
            legend: false
        },
    },

    scales: {
      y: {
        beginAtZero: true
      }
    }
  };


const graph3 = new Chart(document.getElementById('graph3'), config3);



const data4 = {
  labels: [
    'Thermique',
    'Nucléaire',
    'Eolien',
    'Solaire'
   
  ],
  datasets: [{
    label: 'Taux de charge (TCH)',
    data: <?php echo json_encode($tch)?>,
    fill: true,
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgb(255, 99, 132)',
    pointBackgroundColor: 'rgb(255, 99, 132)',
    pointBorderColor: '#fff',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: 'rgb(255, 99, 132)'
  }, {
    label: 'Taux de couverture (TCO)',
    data: <?php echo json_encode($tco)?>,
    fill: true,
    backgroundColor: 'rgba(54, 162, 235, 0.2)',
    borderColor: 'rgb(54, 162, 235)',
    pointBackgroundColor: 'rgb(54, 162, 235)',
    pointBorderColor: '#fff',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: 'rgb(54, 162, 235)'
  }]
};

const config4 = {
  type: 'radar',
  data: data4,
  options: {
    elements: {
      line: {
        borderWidth: 3
      }
    }
  },
};



const graph4 = new Chart(document.getElementById('graph4'), config4);


const labels5 = [2021,2022];
const data5 = {
  labels: labels5,
  datasets: [{
    label: 'Consommation (MW)',
    data: <?php echo json_encode($conso)?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.5)',
      'rgba(255, 159, 64, 0.5)'
    
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)'
      
    ],
    borderWidth: 1
  }]
};

const config5 = {
  type: 'bar',
  data: data5,
  options: {
    maintainAspectRatio: false,
        plugins: {
            legend: false
        },
    },

    scales: {
      y: {
        beginAtZero: true
      }
    }
  };


const graph5 = new Chart(document.getElementById('graph5'), config5);

</script>




