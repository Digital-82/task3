<?php
namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ApiPlatform\Core\Exception\InvalidArgumentException;
use ApiPlatform\Core\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends AbstractController
{
private $entityManager;
private $validator;

public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator)
{
$this->entityManager = $entityManager;
$this->validator = $validator;
}

public function getCollection(): JsonResponse
{
$products = $this->entityManager->getRepository(Product::class)->findAll();

return new JsonResponse($products);
}

public function post(Request $request): JsonResponse
{
$product = new Product();

$data = json_decode($request->getContent(), true);
if (!isset($data['name']) || !isset($data['price'])) {
throw new InvalidArgumentException('Name and price fields are required.');
}

$product->setName($data['name']);
$product->setPrice($data['price']);

$this->validator->validate($product);

$this->entityManager->persist($product);
$this->entityManager->flush();

return new JsonResponse($product);
}

public function put(Request $request, int $id): JsonResponse
{
$product = $this->entityManager->getRepository(Product::class)->find($id);
if (!$product) {
throw $this->createNotFoundException('Product not found');
}

$data = json_decode($request->getContent(), true);
if (!isset($data['name']) || !isset($data['price'])) {
throw new InvalidArgumentException('Name and price fields are required.');
}

$product->setName($data['name']);
$product->setPrice($data['price']);

$this->validator->validate($product);

$this->entityManager->flush();

return new JsonResponse($product);
}

public function patch(Request $request, int $id): JsonResponse
{
$product = $this->entityManager->getRepository(Product::class)->find($id);
if (!$product) {
throw $this->createNotFoundException('Product not found');
}

$data = json_decode($request->getContent(), true);
if (isset($data['name'])) {
$product->setName($data['name']);
}
if (isset($data['price'])) {
$product->setPrice($data['price']);
}

$this->validator->validate($product);

$this->entityManager->flush();

return new JsonResponse($product);
}

public function delete(int $id): Response
{
$product = $this->entityManager->getRepository(Product::class)->find($id);
if (!$product) {
throw $this->createNotFoundException('Product not found');
}

$this->entityManager->remove($product);
$this->entityManager->flush();

return new Response(null, Response::HTTP_NO_CONTENT);
}

public function getItem(int $id): JsonResponse
{
$product = $this->entityManager->getRepository(Product::class)->find($id);
if (!$product) {
throw $this->createNotFoundException('Product not found');
}

return new JsonResponse($product);
}

}

