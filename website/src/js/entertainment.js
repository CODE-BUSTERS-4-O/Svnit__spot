const content = [
    
  {
    title: 'Outings',
    description: 'Best places to visit in Surat for entertainment.🌟 -->Must Visit!✨',
    keywords: [
      'tour',
      'enjoy',
      'trips',
      'friends',
      'journey',
      'excietment',
      'drive',
      'travel',
      'attractions',
      'wonderlust',
      'collegelife',
      'fun'

    ],
    preview: 'https://images.pexels.com/photos/1049687/pexels-photo-1049687.jpeg',
    link: "../../../website/outing/outing.html"
  },
  {
    title: 'Restaurants',
    description: 'The only thing we are serious about is food! 🍒HASTY n TASTY🍟🍕',
    keywords: [
      'coffee',
      'mug',
      'eat',
      'Drink',
      'love',
      
      'food',
      'snack',
      'friends',
      'party',
      'timeout',
      'surat',
      'foody life',
      'hungry'
    ],
    preview: 'https://images.pexels.com/photos/701786/pexels-photo-701786.jpeg',
    link: "../../../website/restaurant/restaurant.html"
  },
  {
    title: 'Clubs',
    description: 'Be Crazy ,Be creative ! welcome to svnit club. . . . 🎵🎷',
    keywords: [
      'Dance',
      'Music',
      'photography',
      'coding',
      'Drama',
      'poetry',
      'development',
      'creativity',
      'innovation',
      'science',
      'groups'

    ],
    preview: 'https://images.pexels.com/photos/6741/light-nature-sky-love.jpg',
    link: "../../../website/club/club.html"
  },
  {
    title: 'Daily Highlights',
    description: 'Be aware about what is happening around surat! latest News!...📢📢',
    keywords: [
      'Viral',
      'news',
      'media',
      'trending',
      'new',
      'covid',
      'sports',
      'surat',
      'daily warmup',
      'lifestyle',
      'important',
      'udates'
    ],
    preview: 'https://images.pexels.com/photos/1034828/pexels-photo-1034828.jpeg',
    link: "https://m.dailyhunt.in/news/india/gujarati"
  }
  
]

function render() {
  let root = document.getElementById('root');
  
  for (i = 0; i < content.length; i++) {
    
    let keywords = '';
    for (x = 0; x < content[i].keywords.length; x++) {
      keywords += `
        <a href="#" class="keyword">
          #${ content[i].keywords[x] }
        </a>
        `;
    }

    root.innerHTML += `
      <div class="item">
        <span class="title">
          ${ content[i].title }
        </span>

        <span class="description">
          ${ content[i].description }
        </span>
        <a href= ${ content[i].link }>
          <div class="image"
          
            style="background-image: url(${ content[i].preview }?auto=compress&cs=tinysrgb&dpr=2&h=190&w=260)">
          </div>
        </a>

        <span class="keywords">
          ${ keywords }
        </span>
      </div>
    `;
  }
}
render();