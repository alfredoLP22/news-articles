<template>
    <div class="flex h-screen m-auto justify-center items-center" style="flex-direction: column !important;">
        <div class="m-auto w-50 p-4">
            <v-card
                class="mx-auto mt-3"
                max-width="344"
                v-for="article in articles"
            >
                <v-card-text>
                    <div>{{article.region.name}} - {{ getDate(article.created_at) }}</div>
                    <p class="text-h4 text--primary">{{article.category.name}}</p>
                    <div class="text--primary">
                        {{article.body}}
                    </div>
                </v-card-text>
                <v-card-actions>
                <v-btn
                    variant="text"
                    color="deep-purple-accent-4"
                >
                    Learn More
                </v-btn>
                </v-card-actions>
            </v-card>
        </div>
        <div class="mt-3">
            <v-btn variant="tonal" class="p-4 mr-2 bg-indigo" @click="getPrev(prevPage)" density="compact">Prev</v-btn>
            <v-btn variant="tonal" class="p-4 ml-2 bg-indigo" @click="getNext(nextPage)" density="compact">Next</v-btn>
        </div>
    </div>
</template>

<script>
  export default {
    data () {
      return {
        limit: 3,
        url: 'http://127.0.0.1:8000/api/articles?page=1',
        prevPage:'',
        nextPage:'',
        articles: [],
      }
    },
    mounted() {
        this.getArticles();
        this.getDate();
    },
    methods: {
        getArticles() {
        fetch(`${this.url}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                this.articles = data.data;
                this.prevPage = data.prev_page_url;
                this.nextPage = data.next_page_url;
            });
        },
        getDate(value){
            if (value) {
                return new Date(value).toLocaleDateString();
            }
        },
        getPrev(prevPag) {
            this.url = prevPag;
            this.getArticles(prevPag);
        },
        getNext(nextPag) {
            this.url = nextPag
            this.getArticles(this.url);
        }
    },
  }
</script>
