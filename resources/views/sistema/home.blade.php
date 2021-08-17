<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{url('css/home.css')}}">
    <title>Pecego e Benfica</title>
</head>
<body>
    <div class="container">

        <div class="hamburguer">
            <div class="line" id="line1"></div>
            <div class="line" id="line2"></div>
            <div class="line" id="line3"></div>
            <span>fechar</span>
        </div>

        <header id="home">
            <div class="img-wrapper">
            <img src="{{ asset('img/FBfrente.jpg') }}" alt="imagem banner">
            </div>
            <div class="banner">
                <h1>Pecego e Benfica Advogados Associados</h1>
            </div>
        </header>

        <aside class="sidebar">
        <nav>
            <ul class="menu">
            <li class="menu-item"><a href="{{route('login')}}" class="menu-link">Login</a></li>
                <li class="menu-item"><a href="#" class="menu-link">Home</a></li>
                <li class="menu-item"><a href="#atuacao" class="menu-link">Atuação</a></li>
                <li class="menu-item"><a href="#cases" class="menu-link">Cases</a></li>
                <li class="menu-item"><a href="#contato" class="menu-link">Contato</a></li>
            </ul>
        </nav>
        <div class="social-media">
            <a href="https://www.instagram.com/pecegoebenfica.adv/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/pecegoebenfica.adv" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.linkedin.com/in/pecego-e-benfica-advogados-associados-42a50285/" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>
        </aside>

        <section class="sessao-conhecimentos" id="atuacao">
            <div class="sessao-header">
                <h1>Áreas de atuação</h1>
            </div>
            <div class="conhecimentos">
                <div class="conhecimento">
                    <div class="conhecimento-header">
                    <h3>Trabalhista</h3>
                </div>
                <div class="conhecimento-text">
                    <p>
                    </p>
                </div>
                </div>
                <div class="conhecimento">
                    <div class="conhecimento-header">
                        <h3>Cível</h3>
                    </div>
                    <div class="conhecimento-text">
                        <p></p>
                    </div>
                </div>
                <div class="conhecimento">
                    <div class="conhecimento-header">
                        <h3>Empresarial</h3>
                    </div>
                    <div class="conhecimento-text">
                        <p></p>
                    </div>
                </div>
                <div class="conhecimento">
                    <div class="conhecimento-header">
                        <h3>Família</h3>
                    </div>
                    <div class="conhecimento-text">
                        <p></p>
                    </div>
                </div>
                <div class="conhecimento">
                    <div class="conhecimento-header">
                        <h3>Penal</h3>
                    </div>
                    <div class="conhecimento-text">
                        <p></p>
                    </div>
                </div>
                <div class="conhecimento">
                    <div class="conhecimento-header">
                        <h3>Tributário</h3>
                    </div>
                    <div class="conhecimento-text">
                        <p></p>
                    </div>
                </div>
                <div class="conhecimentos-img-wrapper">
                    <img src="{{ asset('img/conhecimentos.png') }}" alt="imagem conhecimento">
                </div>
            </div>
        </section>

        <div class="sessao-projetos" id="cases">
            <div class="sessao-header">
                <h1>Cases</h1>
            </div>
        <div class="projetos">
        <div class="card">
            <div class="card-img-wrapper">
            <img src="{{ asset('img/godam.png') }}" alt="imagem Godam" />
            </div>
            <div class="card-info">
            <h2></h2>

            <h3></h3>
            <p></p>
            <button class="btn-projeto"><a href="https://godam.com.br/" target="_blank">Saiba Mais</a></button>
            </div>
        </div>
        <div class="card">
            <div class="card-img-wrapper">
                <img src="{{ asset('img/JBS-Logo.jpg') }}" alt="imagem JBS" />
            </div>
            <div class="card-info">
                <h2></h2>
                <h3></h3>
                <p></p>
            <button class="btn-projeto"><a href="https://jbs.com.br/" target="_blank">Saiba Mais</a></button>
            </div>
        </div>
        <div class="card">
            <div class="card-img-wrapper">
                <img src="{{ asset('img/brf.png') }}" alt="imagem brf" />
            </div>
            <div class="card-info">
                <h2></h2>
                <h3></h3>
                <p></p>
                <button class="btn-projeto"><a href="https://www.brf-global.com/" target="_blank">Saiba Mais</a></button>
            </div>
        </div>
    </div>

        </section>

        <section class="sessao-contato" id="contato">
            <div class="contato-wrapper">
                <div class="contato-left" src="{{ asset('img/contato.jpg') }}"></div>
                <div class="contato-right">
                    <h1>Contato</h1>
                    <form>
                        <div class="input-group">
                        <input type="text" class="field" id="nome">
                        <label for="nome" class="field-label">Nome</label>
                        </div>
                        <div class="input-group">
                        <input type="text" class="field" id="email">
                        <label for="email" class="field-label">E-mail</label>
                        </div>
                        <div class="input-group">
                        <textarea class="field" id="mensagem"></textarea>
                        <label for="mensagem" class="field-label">Mensagem</label>
                        </div>
                        <button type="submit" class="btn btn-submit">Enviar</button>
                    </form>
                </div>
            </div>
        </section>
        <footer>
          <div class="footer-content">
            <p>
              Copyright &copy; 2021, Pecego e Benfica Advogados Associados - Todos os diretos reservados
            </p>
            <div class="social-list">
            <ul>
                <li><a href="https://www.instagram.com/pecegoebenfica.adv/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://www.facebook.com/pecegoebenfica.adv" target="_blank"><i class="fab fa-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/in/pecego-e-benfica-advogados-associados-42a50285/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            </ul>
            </div>
        </div>
        </footer>
        <a href="#home" id="link-topo">
        <i class="fas fa-arrow-up"></i>
        </a>
    </div>
   </body>

   <script src="{{url('js/home.js')}}"></script>
</html>
