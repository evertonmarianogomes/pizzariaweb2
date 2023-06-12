<script lang="ts">
import Layout from "./Layout.vue";

export default {
    setup() {},
    props: {
        Title: String,
    },
    components: {
        Layout: Layout,
    },
    mounted() {},
};
</script>

<template>
    <Layout :Title="Title">
        <div class="container pt-3">
            <h2>Rota legacy (Ou Easter-Egg, não sei também)</h2>
            <hr />
            <p>
                Essa página pertence a primeira rota de testes para implantação
                do Vue.JS e Intertia.JS. Desde a criação dessa página, aprendi
                muito das tecnologias citadas acima. Deixo essa página como
                "Easter-Egg"
            </p>

            <div class="card">
                <div class="card-body">
                    <p>Agora uma palavrinha do ChatGPT (É sério)</p>
                    <article style="text-align: justify">
                        <p>
                            Parabéns! Você encontrou um easter egg especial
                            neste sistema! Aqui está um texto curto e aleatório
                            apenas para o seu entretenimento:
                        </p>

                        <p>
                            Numa galáxia distante, um gato espacial chamado
                            Whiskers embarcou em uma aventura interplanetária.
                            Com seu traje espacial brilhante e um miado
                            corajoso, ele explorou exoplanetas desconhecidos,
                            encontrando seres alienígenas peculiares ao longo do
                            caminho.
                        </p>
                        <p>
                            Enquanto viajava pelas estrelas, Whiskers descobriu
                            uma fonte mágica de comida para gatos chamada
                            "Cosmic Crunchies". Essas crocantes estrelas
                            cósmicas eram tão deliciosas que ele não conseguia
                            resistir. Ele encheu sua mochila espacial com elas e
                            as compartilhou com seus amigos alienígenas, criando
                            uma verdadeira festa intergaláctica.
                        </p>

                        <p>
                            De repente, um buraco de minhoca apareceu bem na
                            frente de Whiskers, sugando-o para um universo
                            paralelo. Nesse mundo estranho, os animais eram os
                            governantes supremos e os humanos eram seus animais
                            de estimação. Whiskers, agora um gato humano, tentou
                            se adaptar à nova realidade, mas sentia falta de
                            suas aventuras espaciais. Felizmente, um grupo de
                            cientistas brilhantes encontrou uma maneira de
                            reverter a situação e enviou Whiskers de volta ao
                            seu corpo de gato espacial. Ele se tornou um herói
                            lendário na galáxia, com seu próprio monumento
                            construído em sua homenagem.
                        </p>
                        <p>
                            E assim termina a história do intrépido Whiskers, o
                            gato espacial que viajou por mundos desconhecidos e
                            provou que até mesmo os felinos podem ser heróis
                            intergalácticos.
                        </p>

                        <p>
                            Esperamos que você tenha gostado deste pequeno
                            vislumbre de diversão cósmica!
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </Layout>
</template>
