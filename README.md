# PHP assignment 2

## Part 1

## criterias

- Create a RESTful API that generates 20 different products.

- It should resemble the following API:
  https://webacademy.se/fakestore/

## Part 2

## criterias

- The user should be able to choose the amount of random items to get back.
  https://webacademy.se/fakestore/v2/?show=5

- The user should also be able to search for a specific categorie.
  https://webacademy.se/fakestore/v2/?category=jewelery

- Implement security optimizations.
  https://webacademy.se/fakestore/v2/?category=foo&show=100

- Publish your API on [Heroku](https://heroku.com/).

## Result

### Part 1

- Get all items.
- [All items](https://pokemonwebb20.herokuapp.com/)

### Part 2

- [Specific category](https://pokemonwebb20.herokuapp.com/v2/?category=fire)
- [Three random items](https://pokemonwebb20.herokuapp.com/v2/?limit=3)
- [Category and a limit](https://pokemonwebb20.herokuapp.com/v2/?category=fire&limit=3)

Security optimizations:

- [Non existing category](https://pokemonwebb20.herokuapp.com/v2/?category=X)
- [Invalid limit](https://pokemonwebb20.herokuapp.com/v2/?limit=30)
- [Both](https://pokemonwebb20.herokuapp.com/v2/?limit=30&category=X)
