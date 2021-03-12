<?php
declare(strict_types=1);

namespace chefkoch;

use chefkoch\clients\CategoryClient;
use chefkoch\clients\RecipeClient;
use chefkoch\clients\UserClient;
use chefkoch\model\User;

class ApiClient
{
    private UserClient $userClient;
    private RecipeClient $recipeClient;
    private CategoryClient $categoryClient;

    public function __construct(
        UserClient $userClient,
        RecipeClient $recipeClient,
        CategoryClient $categoryClient
    ) {
        $this->userClient = $userClient;
        $this->recipeClient = $recipeClient;
        $this->categoryClient = $categoryClient;
    }

    public function getUserById($id): User
    {
        return $this->userClient->getById($id);
    }

    public function getRecipes(string $offset = "0"): array
    {
        return $this->recipeClient->getRecipes($offset);
    }

    public function getRecipesByCategories(array $category, string $offset = "0"): array
    {
        return $this->recipeClient->getRecipesByTags($category, $offset);
    }

    public function getCateogries(): array
    {
        return $this->categoryClient->getCategories();
    }

}
