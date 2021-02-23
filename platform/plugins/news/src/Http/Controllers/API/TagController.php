<?php

namespace Botble\News\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\News\Http\Resources\TagResource;
use Botble\News\Repositories\Interfaces\TagInterface;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * @var TagInterface
     */
    protected $tagRepository;

    /**
     * AuthenticationController constructor.
     *
     * @param TagInterface $tagRepository
     */
    public function __construct(TagInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * List tags
     *
     * @group News
     *
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function index(Request $request, BaseHttpResponse $response)
    {
        $data = $this->tagRepository
            ->getModel()
            ->where(['status' => BaseStatusEnum::PUBLISHED])
            ->select(['id', 'name', 'description'])
            ->paginate($request->input('per_page', 10));

        return $response
            ->setData(TagResource::collection($data))
            ->toApiResponse();
    }
}
