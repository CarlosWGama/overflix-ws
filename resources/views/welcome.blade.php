<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Overflix</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <style>
            .container {
                padding: 20px;
            }
            .url {
                padding:5px;
            }
            .info {
                font-weight: bolder;
                text-align: center;
                margin: 30px 0px 0px;
            }
            .rota {
                border-top: solid grey 1px;
                border-bottom: solid grey 1px;
                padding: 10px 0px;
            }
            h5 {
                margin-top: 40px;
            }
        </style>
    </head>
    <body class="container">
        <h1>OverFlix - API</h1>

        <h2>Vídeo de Teste</h2>
        <p>{{asset('videos/flexbox.mp4')}}</p>

        <h2>Rotas</h2>
        {{-- LOGIN --}}
        <h5>Login</h5>
        
        <p class="rota">POST <span class="url alert-success">{{url('/api/login')}}<span></p>
        <p class="info">Parametros</p>
        <table class="table">
            <thead>
                <th>Campo</th>
                <th>Possível Valor</th>
            </thead>
            <tbody>
                <tr>
                    <td>email</td>
                    <td>carlos@teste.com<br/>kaio@teste.com</td>
                </tr>
                <tr>
                    <td>password</td>
                    <td>123456 para carlos@teste.com<br/>654321 para kaio@teste.com</td>
                </tr>
            </tbody>
        </table>
        
        <p class="info">Exemplo Retorno</p>
        <code>{
            "jwt": "string", "user": {"name": "string", "email": "string", "avatar": "string"}
          }</code>

        <hr/>
        <h5>All Projects</h5>
        <p class="rota">GET <span class="url alert-success">{{url('/api/projects')}}<span></p>


        <hr/>
        <h5>One Project by Id</h5>
        <p class="rota">GET <span class="url alert-success">{{url('/api/projects/{projectID}')}}<span></p>

        <hr/>
        <h5>Projects by Category ID</h5>
        <p class="rota">GET <span class="url alert-success">{{url('/api/projects/category/{categoryID}')}}<span></p>

        <hr/>
        <h5>Watch (1)/Unwatch (0)</h5>
        <p class="rota">PUT <span class="url alert-success">{{url('/api/projects/videos/{videoID}/{watch}')}}<spa
    
    </body>
</html>
