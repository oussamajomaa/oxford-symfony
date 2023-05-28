function echartPie(data, title) {
    let optionPie = {
        title: {
            text: title,
            subtext: 'Fake Data',
            left: 'center',
            
            

        },
        tooltip: {
            trigger: 'item'
        },
        legend: {
            type: 'scroll',
            orient: "horizontal",
            bottom: 'bottom'
        },
        series: [
            {
                top: '10%',
                bottom:'10%',
                name: title,
                type: 'pie',
                radius: '90%',
                data: data,
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    }
    return optionPie
}