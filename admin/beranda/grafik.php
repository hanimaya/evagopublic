<div class="col-md-6">
            <div class="grid visitor">
              <div class="grid-body full">
                <h3><?php echo $cetak?><span class="pull-right">Week 24</span></h3>
                <div id="chart-donut" class="chart" style="width:100%; height:250px;"></div>
              </div>
              
            </div>
          </div>
<script type="text/javascript">

/* FLOT CHART */
function initFlot(){
 
  
  var dataSet4 = [
    { label: "Label 1", data: [1,20], color: "rgba(52, 152, 219, 0.7)" },
    { label: "Label 2", data: [1,20], color: "rgba(46, 204, 113, 0.7)" },
    { label: "Label 3", data: [1,10], color: "rgba(231, 76, 60, 0.7)" },
    { label: "Label 4", data: [1,50], color: "rgba(241, 196, 15, 0.7)" }
  ]

  /* FLOT CHART 4 */
  var donut_chart = $.plot($("#chart-donut"), dataSet4, {
    series: {
      pie: {
        show: true,
        innerRadius: 0.4,
        radius: 0.9,
        label: {
          show: false,
          radius: 1
        }
      }
    },
    legend: {
      show: false
    },
    grid: {
      hoverable: true
    }
  });
}


$(function() {
  "use strict";
  
  initFlot();
  
});
</script>
    
    