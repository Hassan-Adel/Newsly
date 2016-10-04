/**
 * Theme: Moltran Admin Template
 * Author: Coderthemes
 * Module/App: Dashboard
 */


! function($) {
    "use strict";

    var Dashboard = function() {
        this.$body = $("body");
        this.$realData = [];
    };

    //creates plot graph
    Dashboard.prototype.createPlotGraph = function(selector, data1, labels, colors, borderColor, bgColor) {
            //shows tooltip
        
            function showTooltip(x, y, contents) {
                $('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css({
                    position: 'absolute',
                    top: y + 5,
                    left: x + 5
                }).appendTo("body").fadeIn(200);
            }

        $.plot($(selector),
                [{
                data: data1,
                label: labels[0],
                color: colors[0]
            }], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});
		// Add the Flot version string to the footer
		
        
            $.plot($(selector), [{
                data: data1,
                label: labels,
                color: colors[0]
            }], {
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        lineWidth: 1,
                        fillColor: {
                            colors: [{
                                opacity: 0.0
                            }, {
                                opacity: 0.7
                            }]
                        }
                    },
                    points: {
                        show: true
                    },
                    shadowSize: 0
                },
                legend: {
                    position: 'nw'
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    borderColor: borderColor,
                    borderWidth: 0,
                    labelMargin: 10,
                    backgroundColor: bgColor
                },
                yaxis: {
                    
                    color: 'rgba(0,0,0,0)'
                },
                xaxis: {
                    mode: "categories",
                    color: 'rgba(0,0,0,0)'
                },
                tooltip: true,
                tooltipOpts: {
                    content: '%s: %x is %y news',
                    shifts: {
                        x: -60,
                        y: 25
                    },
                    defaultTheme: false
                }
            });
        },
        //end plot graph

        //creates Pie Chart
        Dashboard.prototype.createPieGraph = function(selector, labels, datas, colors) {
            var data = [{
                label: labels[0],
                data: datas[0]
            }, {
                label: labels[1],
                data: datas[1]
            }, {
                label: labels[2],
                data: datas[2]
            }];
            var options = {
                series: {
                    pie: {
                        show: true
                    }
                },
                legend: {
                    show: false
                },
                grid: {
                    hoverable: true,
                    clickable: true
                },
                colors: colors,
                tooltip: true,
                tooltipOpts: {
                    defaultTheme: false
                }
            };

            $.plot($(selector), data, options);
        },



        //initializing various charts and components
        Dashboard.prototype.init = function() {
            //plot graph data
 var admin = [    
<?php 
            
$con=mysqli_connect("127.0.0.1","root","","news");

$result = mysqli_query($con,"SELECT * FROM `users` where privilege_add=1 or privilege_edit=1 or privilege_delete=1 ");

$count= 0;
$num= mysqli_num_rows($result); 
while($row = mysqli_fetch_array($result)){
    
    $result1 = mysqli_query($con," SELECT * FROM `log` WHERE `Type`='add new' and `Admin`='$row[0]' " );

                ?>
           
                ["<?php echo $row[1]; $count+=1;?>" ,<?php echo mysqli_num_rows($result1);  ?>]
            <?php if ($count <$num ) { echo ',' ;}?>    
            
<?php }
?>
       ];     
        
            var plabels = ["Admin","das","dss"];
            var pcolors = ['#317eeb', '#29b6f6'];
            var borderColor = '#fff';
            var bgColor = '#fff';
            this.createPlotGraph("#website-stats", admin, plabels, pcolors, borderColor, bgColor);

            //Pie graph data
            var pielabels = ["Series 1", "Series 2", "Series 3"];
            var datas = [20, 30, 20];
            var colors = ["rgba(30, 136, 229, 0.7)", "rgba(41, 182, 246, 0.7)", "rgba(126, 87, 194, 0.7)"];
            this.createPieGraph("#pie-chart #pie-chart-container", pielabels, datas, colors);

        },

        //init Dashboard
        $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard

}(window.jQuery),

//initializing Dashboard
function($) {
    "use strict";
    $.Dashboard.init()
}(window.jQuery);