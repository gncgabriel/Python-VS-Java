<?php
class Query
{
  public $query = '
    {
  search(type: REPOSITORY, first: 100, query: "stars:>100 language: {language} ") {
    repositoryCount
    pageInfo {
      endCursor
    }
    nodes {
      ... on Repository {
        nameWithOwner
        stargazerCount
        primaryLanguage {
          name
        }
        watchers {
          totalCount
        }
        createdAt
        forks {
          totalCount
        }
        releases {
          totalCount
        }
      }
    }
  }
}

      ';

  function mountQuery($language)
  {

    $readyQuery = str_replace(array('{language}'), array($language), $this->query);
    return $readyQuery;
  }
}
