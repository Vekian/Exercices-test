<?php

use App\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    public function testTitleIsEmptyByDefault()
    {
        $article = new Article();
        $this->assertEquals('', $article->getSlug());
    }

    public function testSlugIsEmtpyWithNoTitle()
    {
        $article = new Article();
        $article->title = '';
        $this->assertEquals('', $article->getSlug());
    }

    public function provider()
    {
        return [
            "testSlugHasSpacesReplacedByUnderscores" => ["An example article", "An_example_article"],
            "testSlugHasWhitespaceReplaceBySingleUnderscore" => ["An     example  \n   article", "An_example_article"],
            "testSlugdoesNotStartOrEndWithAnUnderscore" => [" An example article ", "An_example_article"],
            "testSlugDoesNotHaveAnyNonWordCharacters" => ["Read! This! Now!", "Read_This_Now"],
        ];
    }

    /**
     * @dataProvider provider
     *
     * @Description("La méthode testSlug prend deux paramètres : $title et $slug qui sont définis dans la méthode provider.
     * Cela représente un test de données multiples correspondant à chaque paire de données dans le tableau retourné par la méthode provider.)
     *
     * Cela permet de tester plusieurs cas de test avec une seule méthode de test.
     * Assez pratique pour tester des cas de test similaires.")
     *
     * @param string $title
     * @param string $slug
     */
    public function testSlug($title, $slug)
    {
        $article = new Article($title);
        $article->title = $title;
        $this->assertEquals($slug, $article->getSlug());
    }
}
