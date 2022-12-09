@extends('layouts.main')

<!DOCTYPE html>
<html>
  <head>
    <title>{{__('strings.home_title')}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
    integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style>
        html{
            font-family: 'ZCOOL XiaoWei', serif !important;
        }
        .first {
            background-image: url(https://wallpaperaccess.com/full/3876048.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            height:900px;
            color: white;
        }

        .first h1 {
            color: white;
        }

        .firt a {
            color: white !important;
        }
        .social li{
            font-size: 17px;
            display: inline-block;
            float:right;
            padding-right: 1%;
        }

        li a{
            color: white !important;
        }

        nav{
            margin-top: 6%;
            border-top: 1px solid white;
        }
        .pink{
            background-color: #b62b52;
            text-align: center;
        }

        .green{
            background-color: #769d2a;
            text-align: center;
        }

        .teal {
            background-color: #01a0a6;
            text-align: center;
        }

        .orange {
            background-color: #E77E21;
            text-align: center;
        }

        .purple {
            background-color: #8947DD;
            text-align: center;
        }

        a h2 {
            color: white;
        }

        a:hover {
            text-decoration: none!important;
        }

        .first .pink, .first .pic, .first .green {
            padding-right: 0px !important;
            padding-left: 0px!important;
        }

        .green a, .pink a, .teal a {
            padding: 6%;
        }
    
        footer {
            background-color: black;
            color:white;
            padding: 4%;
        }

    </style>  
   </head>
   <body>
      <div class="first">
        <div class="container">
            <h1>BIBLIOTECA DE SERIES</h1>
            <nav class="navbar navbar-expand-sm"></nav>
         </div>
         <div class="container">
            <div class="row">
                  <div class="col-12 col-md-4 col-lg-4 col-xl-4 pink">
                     <a href="platforms/">
                         <h2>PLATAFORMAS</h2>
                     </a>
                   </div>
                  <div class="col-12 col-md-4 col-lg-4 col-xl-4 pic">
                      <img style="width:100%;"src="https://eventovirtual.co/wp-content/uploads/2019/07/Plataformas-que-usan-streaming-2.jpg">
                   </div>
                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 green">
                       <a href="actors/">
                         <h2>ACTORES</h2>
                       </a>
                   </div>
             </div>
             <div class="row">
                   <div class="col-12 col-md-4 col-lg-4 col-xl-4 pic">
                         <img style="width:100%;"src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUWFRgWFhYZGRgaHBgcGRwaHBwaHB8cHBocHBwcGhocIS4lHR4rJBkeJzgmKy8xNTU1GiQ7QDs0Py40NTEBDAwMDw8PGA8RGDQdGB0xMTE0NDE0MTE0ND8/NDE0PzQ0MTExMTQxNDQ/MTExMTExMTExMTExMTExMTExMTExMf/AABEIALEBHAMBIgACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAABAUDBgcBAv/EAEYQAAEDAgMFBQYDBgIIBwAAAAEAAhEDIQQSMQVBUWFxBiKBkfATMqGxwdEUUuEjQnKCsvFiswcVM0NzdJKjJCU1ZJOiwv/EABYBAQEBAAAAAAAAAAAAAAAAAAABAv/EABURAQEAAAAAAAAAAAAAAAAAAAAB/9oADAMBAAIRAxEAPwDjKIvSEHiIiAiIgIiICBF9NEoJVOnIa0auNzwAW/0cMymynTDQW0Q2q9pF31Xh3s2niAA4u6Babsilmqtk2gT0JuRxAAK6h2X2e54NWo333OfB4E90R+WwcZ1mNBepVpsTAezpsa4Av999hd5Mn4mAOAXm2wwuZmy91lZ+79yk5jvL27VNALXWdIiAHfefmD1Ws7crF9cMn3qOSBuOIqsZx/JQnwQbD2PwLaeEpDIC4sDnEgG7u946/BaB/pZ2ZlqsrtFqjQ18DR7LNJI3lpj+QrpbamVrWaAWB5AQOipO2Gz24jC1WC7gC9l57zRmFzx7w/m3ING2a9lYvfAb3cQ0TcQ5vvGeRv06LFSeXbGruOv4yjc/8I2VPsrEZKGIN/8AZwP5y1h+Dits2Js4u2M9oBzPxDHnfqxzRPLKJ8UHOZjd9v7LI588vqVZYzYz2guZ32gkEAguBBg/xCZ0VeaENBvB3b0GAtPFeZrRwUqlRkHiDHgVifT38NUVhasgAy+P2/VevpwQdxXzujigxletQheBQCF4vor5QEREBERAREQEREBERAREQEREBEVr2e2YMRXbTJIbBLiNYHCeZCCqWSmFs3bDs23DFjqclj4Akyc0GRpyB/mWsU5myC+2OyX3/fa4Ab9Q3ws74FdlwzhlEcFyTZWGfEgHSW6xppJ136Wm/JdOwFV2UdFUWNYyPXr0Fr2Foe2xL32axj4BA3U2uYwQf8bqrumQ7wrbFve4ZGGHOnvflH5uZ4DlwX3hMI1jMjRYR8BH0HkOCoyVGne6eggyPG3xUaq9zhlcI3SSBM21cVII5+uCx13CIGv3QcSqMcyk4HWcruRa8yD8F1LsbRc7A1WGxZVoCDyw4kHlcrQttUGu9s5kd6o64Mgl9U5SNwBa0HxXQ+x49phsUGuBAxTADMiBSA1CgpX7Pc3PmygZnuBaXSSSHQbaAknW9tIM6nXwBdDW6kkARv6Dz8F1h2zmkQ658wqTE7HykuZAO4wCR0tHwVGl0sHlc+W2AY3Q+9Bt5Pb5KrxFEBxG5bPtDZ72iM5AE2A3kySSZJJMkneSqWth4M/NBVVcNAtpw4LE/DaK1eLKK5BWVBCxLNiB3liIUqvF4vV4oCIiAiIgIiICIiAiIgIiICIiAs+ExBY9r2kgtINjB53WBEHQTtJ1em7DVD3yWvpO0z5XBwE6B5GYT/iWrjBhuM9mLgPI8JJ84t4K+7JMZWpQ+5pmP5SJb5EHyUDEtAxzIOaXNvxi0nnCqN5wmHa0NOp+UbgrrDFVWHdaOB/VXeEAiVRkYSpWGcPRXw2N6+iANP0QTfZs4D1ut4Kk7QbPa9mRr/Z5pktgOLR70Od7trTrfxUt+Kyi9+Pr7KFiMVmmHbtOfMqDRtqbIpMpta33Q4Q0ElriA4w4mXGSxoiQLggWW3disI9mBqQMr3Vw57YiDkNummiPawuDiAS2YPCwFpPLgr/ZVUHDvMz+0bJ1mWFBA/C1CM2b4/YKLjMM8RLtFaGtuFv1/uqvaNbQE68FRre05E6HzWtYp+5X+1RrwutcrNk6feyCPXdwUYjipFRhUdx1QVuJF18AWPRZsVYqO5QfAXhWenTtmOix1tSor4REQEREBERAREQEREBERAREQEREGydia8Vyyf8AaNIH8QuPhmUvaOCfTxNJzxYvsfET8/ita2ZiTTqseP3XA+E3+Erq3aBrMRSZUZPtKbmuc0XljmkF4tdsGbforErC9+UA8YUZvacssW26nz05afqsjO8zw+a1XahyOMix9SqNjpdrd50k728uGgvy3qzw3aZjrF0aHlHy/uuaPxLN48YKxfiGjRxAmYuPGyDq1Ta7SdVGdtFszMrmrMc7c8+M/NSqW0Hz70+KDd6m0QFtXZ7EZ8JUIP8Avm/0FcofjCQt57GYg/gKx1jEMA/+ElQW1bFhpPrxkqgx21gXQL9Ot1F2ntCc0n16K1bF44/u2M6/bgqLbH7TExfiJsf7a33qpq15uN/rcoDHPeYbJM/bf4KeNjva2XuvwJ9eggxmrx+ajudey+qoLbf3WIGyCNjdVGaNFJxe5RmuuoJYux3h8wodT3j1PzU0ukeXzCguMkor5REUBERAREQEREBERAREQEREBERAXTewHaAey9m5oc+kIANi6m7UA8RbyC5kpezsc6i8PbqNRuI3goOmYVo9o9gEDM7KNbSYFlnxmxmvEwqnZWPFTLUAIDj1vMEeY8oW5YYSFpGhY7s6w3Exe08rG6g19hU8tntJFxm7jvGe6egN+S2/auHIcY/Ra7jKLyd1vLxQatiaLqYLYaeJkOPwsoDZC2SthBeT65rDh9guqnuAxMIMvZTBnEPcz8oBn5Lo+EwH4fAVhP8Av2H/ALZCj9k+zgwwLj7zwPgrXti0/gKkWPtmac2OmPAlQcgxmJJc4zabKOyi95DWgknhrA9arMKUnxXQtisp02H2dJhe6Mz6gLjpYNGjfXNUaRU2BiaYDgDdurSSWmRqWmRwnS5X0zD4wgyXFoFy8ZR0DnRK6CcXYmpRmxuxxF73ieZ04DgFru1K+aQxj5MgFwItqZmyDTa1RwPe15LGx6um7NJku19fdYq2DDdLIKqtTlRHi6tHthVgufFBkc6BHAX6nRRVnrndvJJPyCwLKiIiAiIgIiICIiAiIgIiICIiAiIgIiINv7LVpoObva4kdCB+vktz2fj7arnXZXEZajmn95trxdpnxtK2ZlTI7W2oVRtmJe17b6rX8bgnXAPReMxTuKzipO9URdndn85l7hA5/ILcsFhWMaGsaLb1RtxGXepWB2q0GLk/RBf1nmR8V89oBmwLv42f0O+q9p4hr4I14KRtxv8A4EwL+0H9Lo+ag4m8htQ9Sty2TiWuaI5fK60vHtcHuniVbdnaxnKqNyzgR4dN3rwUXEvLhPqJhZHM8LyAo+KrNY0FxMG1gXRIkTG4/dBWVy2Du3z10VDj3xN/JWmNxVK+V4eeIO/SOJtp4LXcdVzO8UEas+y+KTA0dNV5XPrpdR8RiJEDTfzUGB5kkr5RFFEREBERAREQEREBERAREQEREBS8FigzOcocXNLRImCXNM9YBHioiILx+1KJBiiDLpDSAA0ZgTdpBMgeGlxAGEbUaHNdkacrHtaC1sSS7KTETDS0eCqUQbFgNtU2PY72QMAA91oyyWTB/eHdce9fvxxJ2qlWbkbIvB72Vjrk+/3tTcNg7r8FzNbxs7FB9FhvMX3mW2MjhN5nerEq5o4pmY/sx3okQIABHumNYndrGoUyhihljIJywDDbe/fS/vN/6VTYZ4mD8DPyVkwqhjKgJJAjkNApWwNmZn53aC3WVjwmFzuCs9p/iMOwVKbM7GiXtEZgBcuAOojhe3kFt+FDSC2ystoXwZG/OP6Stc2X2io12Z2ujiDYg7wVb1Me1+FqEEQKjBbmwqDlXaOmA8xCrNj4rLUAJhWO3sU1z3DXpxnetcxTwHAtVHVqNUHI7UAtJETIG6D4rE/FMg5xF5MMYZbAsJAAJiZj5lUGwdqSwAlSMfiZlBC2ji6YIhjZyPBzMY+SWMawjMLQ9pPjzhU9LFsDWNLBID5fkY85iX5TlcJeAHNsXRbSwXmNqjd9FWucoJu0MZRdTc1jIdlb3slNsnMMxAaMzZjQOLQCRGhXxW2jh3F/7KA6zIawZQ0ktMBonMSAd4DdXSq6p7rvD5yoaitgqbRwzg4exDJNSC1rXQHNgG5EQ4yALAAQq3HYhjgxrGgZQczg0NLjMAwCYGVrTH5i471BRAREQEREBERAREQEREBERAREQEREBERAV32dxUFzDv7zddQL6cgPJZdi9lsRiIdlyMP7zhqP8LdT8AuibH7I0aLYDMziCHOddxB1A4eCo1h1jIOpOs+ZnWw+CtMC7MBwMfFQNq4J9Co6m8SLFpFszSYbEzBnUDgdFl2XiIdwvMW4Ddwv+gVRt2CqNaALa3VjicW0scwkd4EdRlkz8LX1C0z8bkfmMjWLSCRBjrujcpjcW2oAJ3iZ/LIJvu3eSDUdodn6lEvfScQJIjkOmv6qz2Xj3s2TiXEnN+LptOpj9kfsrHEQJOpN+tjBPGOHNS9i7H9rga7BbPimPAP/AAjw+wUHL6mILjMlR6rpKvdt7BdScRY33GVSOoOCol7KxZYYVziMTI1Wt0mGVZB5ywUGCq8rFKVym5QY6/ufzKGpuK9wdfuoSVRERQERelpGoQeIiICIiAiIgIiICIiAiIgIp+ztl1axhjZG8mzR4/Zb7sHsVSbDqv7R3Ajuj+Xf4oNJ2TsGviD3Gw3e51m+HHwXR+zvYejShzx7R/FwsP4W/Uytu2bs0GGtA8BAH2C2TDbHAEk+SqKOhhgNApDMOFZ4rCMZfNA56deir/xtI1DTY9r3tHeDZMGLguAieUoKHtXsdtenIAz05LDxmJYeRgeIBXPMO4gixBBA5g6EEbv0XW8boVz7tHgQ1+doEOs62h/N1P0HFBQ4h8mJiNNPG5MDVVuIxVVhIax0TrHq/wA1ZYoEEOEZTBMgbuJI4H49FLova9usERAKo1nEYmu0S8VG83AgecLZNlbUezZNd+YycXTbruNE2t0Xy6u8BzCDcRHxjoth2Hg2HAVg5oynFMcQIH+7I32lQc0qbVLtxlR34p3A+K3faNFjGd1jWzrAE+tPitdeWvfAAjiFRB2bSc8mRZTK1OJ6K0pU2sbzj165qsx9WfXBBXVxdeOFwF4dV9tUHxjvdHX6KArOpSc+GtEkmwWxdn+xLqzgHmBq6NAOZ1J5CPqiqLs52erY2qKVFvNzjOVreLj8hqV17B/6MsDQp/tAa1QZZc9zmtkmLMYRA5Enqtl2BsyhhaYZSYGt3xq51hmcdXOtru0WTHY0EEA92CTwtlcNOpRGg7SpNoHLTpsotOeCxjbgENbJImSeuvJQcSxjmxVl8WGdxcCeQECPnpCse0RDnmYu538JJqZWzFzAY53itSrYjIYJkWjSYuYcBpM+UqjW9sYAU3S2cp47jw6KsWyY6sXTJEEQQBuHz4eC16o2CVFfCIigIiICIiAiKXgcE6o6BYDU/bmgwUaLnGGgkrZtk9n2iHVO8fy/u+PFScDg2sENHXieqsqTlRc4FjWgAAABX2AZmMDx5LWsK4np60V9hMTlAHrxRG54DK0QP1PVWjcUFp1DHc1NGNHFRVliMUHmAfvMTc7gtNZUdg6rqetB5L6YgDKSe+wO3kG4B3EXXm19qOp1GvF6bjlqATIIgte0aG0+Y3rNtOuytQmziIINr2tfncKosvxbHiWkHlvHUagqh200OBadCqhuKLCDmOlnjWODh+8PV19YnaBcO9GlnD3T9kFBiWmC3Ugk3O7qqpr3Nk8FY42p3p5/BRS8EHpdUY/9f92HWO4iJ03zrf6q92RtJ/8AqrEPzQfxdMAm+tIiFr34WmAZC2DZFFo2ViBq0Yymf+yVBruJrvqQSSZ8AUw1PJJOqzvcIso1eruQeYjEniq+pUleOesRKDICpmAwb6hhum8nRRcLhX1DDRbedw+5W24bDhjQ3QAeuqCTgMJQoiB33bzEknhwHRbtsDZ72jPV7oN20m6/xVOJ4DQSZvpRdnqbGnObke7y1708VsQ2qx2jhF/UoPjaO08pLgSJa7KDIFj3bTvtzVdV2n7wnWRE/wCER4AT5KPtDFNcZGojLJJEwSDfXePFUFV0WHKOMRfq4yL80E3aWJDg48c3kRWP1C1zG2cRuk+ESI6wyx5qZVrE2J1+rY8YB5aqDXv4n5knzg/FBV12RbdoPsTy+ZUPatMNLG7wwE/zOc76qyLJsdTH0PndRtrs/aOH5WN+ACCmRCEUUREQEREGWhTzOA81suDLWNAAstewzoVxhnoLVmIVhg2577vWircHRznlvV9SAFhoFRlZZSG1lHRpUE5mLI3rI/aJa0nhqFWErFXecrvWqCfVxjXgtJs4QeRGh5XKpKeLfTnKe6dWzwN48z5qHtF7muBG9txxI/v8EoV84vrJVRZMxTXtHEajgoNWo5h7t2nVu7qOBUeswi7bFeMr5u6bO+fRB84x7SMzVVvq5Ty+u5ScUzwUaqxBhqVrcdd62fZTv/Ka/wDzlP8AyXLT6tMhbTgHxsasf/e0v8pyCnrVrWUGtVXlasoznSg9L194Zmd4adN/RYCp+yqQJLjusPqg2GhUYwZWiemgUrBUDUd3ycouYsOirWOAElXNJ2VgA36/XRBZGvIiIYPdaLAxYEgH3eAiIUGviiTlBgAy6OUcwYC+H14tHh+gB+SjVnECNOPGOET4oMrsXJ1tw1sNAD61WMut8P8A6kfQLCwifXjC+3uJsOnnwQYnifGfiB8LjyWJ7f05X+AAgKTVYQJJG/lrYfJYH/X/APRj5/BBGpUpe0etGqBtc/tXj82Ro/6r/wBKuMGQXCdwnyAN1S48/tgeDZ/qQU718r0rxRRERAREQZaKssOiILrZ2h6qzYiIMq8OqIgO0WKpo7wREEDaH7vj9FBw3vHw+qIqiW7RQD77V6iD5xui8qIiCHVV1R/9Krf83R/ynIiK1iovlERHinbP39fsiIJVfQdQrpmo6/Reog8xGg6j5hYav0d8kRAp/UKRQ+hREFZj/f8AH6lZm6eX9S9RAw2p/hP9LVTY73z/AA/deogqyiIooiIg/9k=">
                    </div>
                   <div class="col-12 col-md-4 col-lg-4 col-xl-4 teal">
                        <a href="directors/">
                           <h2>DIRECTORES</h2>
                        </a>
                    </div>
                     <div class="col-12 col-md-4 col-lg-4 col-xl-4 pic">
                            <img style="width:100%"src="https://i.blogs.es/ca5006/direc001png/450_1000.jpg">
                    </div>
              </div>
              <div class="row">
                  <div class="col-12 col-md-4 col-lg-4 col-xl-4 pink orange">
                     <a href="languages">
                         <h2>IDIOMAS</h2>
                     </a>
                   </div>
                  <div class="col-12 col-md-4 col-lg-4 col-xl-4 pic">
                      <img style="width:100%;"src="https://previews.123rf.com/images/hoperan/hoperan1009/hoperan100900031/7725498-fondo-para-el-tema-de-la-pel%C3%ADcula-.jpg">
                   </div>
                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 pink purple">
                       <a href="series/">
                         <h2>SERIES</h2>
                       </a>
                   </div>
             </div>
         </div>
      </div>
      <footer>
          <p class="text-center">Nicole Moreno y Dámaris Núñez<br></p>
      </footer>
   </body>
 </html>

