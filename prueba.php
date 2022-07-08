let  myChart2; 

    function CrearGraficoSupervisor(titulo, cantidad, tipo, encabezado, id)
    {
        $("#"+id+"1").html('<canvas id="'+id+'" width="100%" height="40"></canvas>');
        var opt = {
        events: false,
        
        scales:{

            /* r: {
                    angleLines: {
                        color: 'red'
                    }
                } */
             yAxes:[{
                ticks:{
                    beginAtZero:true,
                    autoSkip: false,
                    maxRotation: 90, 
                    /* minRotation: 90, */
                    padding:0,
                    mirror: false,
                    stacked:true
                }
            }] 
        },

        legend:{
                    display:true
                },
                
        tooltips: {
             /* callbacks:{
                        label:function(tooltipItem){
                            return tooltipItem.yLabel;
                        }
                      }  */
            enabled: false
        },
        hover: {
            animationDuration: 0,
        },
        animation: {
            duration: 1000,
            onComplete: function () {
                var chartInstance = this.chart,
                ctx = chartInstance.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x, bar._model.y +15);
                    });
                });
 
                  
            }
        }
        };
        var  ctx = document.getElementById(id);
            if(myChart2)
            {
                myChart2.destroy();
            }
                myChart2 = new Chart(ctx, {
                type: tipo,
                data: {
                    labels: titulo,
                    
                    datasets: [{
                        label: encabezado,
                        data: cantidad,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(154, 184, 23, 0.2)',
                            'rgba(245, 40, 145, 0.2)',
                            'rgba(113, 40, 145, 0.2)',
                            'rgba(0, 255, 145, 0.2)',
                            'rgba(0, 123, 145, 0.2)',
                            'rgba(230, 202, 255, 0.2)',
                            'rgba(236, 17, 255, 0.2)',
                            'rgba(236, 230, 32, 0.2)',
                            'rgba(236, 230, 179, 0.2)',
                            'rgba(14, 213, 234, 0.2)',
                            'rgba(117, 234, 14, 0.2)',
                            'rgba(28, 40, 16, 0.2)',
                            'rgba(250, 99, 4, 0.2)',
                            'rgba(4, 250, 22, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(154, 184, 23, 1)',
                            'rgba(245, 40, 145, 1)',
                            'rgba(113, 40, 145, 1)',
                            'rgba(0, 255, 145, 1)',
                            'rgba(0, 123, 145, 1)',
                            'rgba(230, 202, 255, 1)',
                            'rgba(236, 17, 255, 1)',
                            'rgba(236, 230, 32, 1)',
                            'rgba(236, 230, 179, 1)',
                            'rgba(14, 213, 234, 1)',
                            'rgba(117, 234, 14, 1)',
                            'rgba(28, 40, 16, 1)',
                            'rgba(250, 99, 4, 1)',
                            'rgba(4, 250, 22, 1)'
                        ]},{
                        label: encabezado,
                        data: cantidad,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(154, 184, 23, 0.2)',
                            'rgba(245, 40, 145, 0.2)',
                            'rgba(113, 40, 145, 0.2)',
                            'rgba(0, 255, 145, 0.2)',
                            'rgba(0, 123, 145, 0.2)',
                            'rgba(230, 202, 255, 0.2)',
                            'rgba(236, 17, 255, 0.2)',
                            'rgba(236, 230, 32, 0.2)',
                            'rgba(236, 230, 179, 0.2)',
                            'rgba(14, 213, 234, 0.2)',
                            'rgba(117, 234, 14, 0.2)',
                            'rgba(28, 40, 16, 0.2)',
                            'rgba(250, 99, 4, 0.2)',
                            'rgba(4, 250, 22, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(154, 184, 23, 1)',
                            'rgba(245, 40, 145, 1)',
                            'rgba(113, 40, 145, 1)',
                            'rgba(0, 255, 145, 1)',
                            'rgba(0, 123, 145, 1)',
                            'rgba(230, 202, 255, 1)',
                            'rgba(236, 17, 255, 1)',
                            'rgba(236, 230, 32, 1)',
                            'rgba(236, 230, 179, 1)',
                            'rgba(14, 213, 234, 1)',
                            'rgba(117, 234, 14, 1)',
                            'rgba(28, 40, 16, 1)',
                            'rgba(250, 99, 4, 1)',
                            'rgba(4, 250, 22, 1)'
                        ]},
                        borderWidth: 2,

                    }]
                },

                
                options:opt
                
            });

            
    }

