function echartBar(xAxis,data){
    let optionBar = {
        xAxis: {
            type: 'category',
            data: xAxis,
            axisLabel: {
                inside: true,
                color: '#000',
                rotate: 90,
            },
            zlevel:29
          },
          grid: {
            bottom: 3,
            containLabel: true,
        },
        dataZoom: {
            start: 0,
            type: "inside"
        },
          yAxis: {
            type: 'value'
          },
          series: [
            {
              data: data,
              type: 'bar',
              color:'#FF4069'
            }
          ]
    }
    return optionBar
}