<?php
/**
 * Events Controller file
 *
 * PHP version 8.0
 *
 * @category  Account
 * @author    Sripriya <sripriyajalvadi90321@gmail.com>
 * @version   GIT: <git_id>
 * @since     File available since release 0.1
 */
namespace App\Http\Controllers\Views\Internal;
use App\Models\Bucket;
use App\Models\Ball;
use Illuminate\Http\Request;

class BallBucketController extends Controller
{
    public function addBucket(Request $request)
    {

        // Create a new Bucket instance and save it to the 'buckets' table
        $bucket = Bucket::create($request->all());

        // Empty all buckets
        Bucket::all()->each->emptyBucket();

        // Return a JSON response if you need it
        // return response()->json($bucket);

        // Return the view with any data you might need
        return view('internal.crm.bucket&ball');
    }


    public function addBall(Request $request)
    {

        $ball = Ball::create($request->all());

        // Empty all buckets
        Bucket::all()->each->emptyBucket();

        return response()->json($ball);

    }

    public function suggestBuckets(Request $request)
    {
        // Get all buckets
        $buckets = Bucket::all();

        // Sort buckets by volume in descending order
        $buckets = $buckets->sortByDesc('volume');

        // Get all balls
        $balls = Ball::all();

        // Iterate through each ball type
        foreach ($request->all() as $ballName => $ballCount) {
            // Sort buckets based on empty volume
            $buckets = $buckets->sortByDesc(function ($bucket) {
                return max(0, $bucket->volume - $bucket->balls->sum('volume'));
            });

            // Distribute balls to buckets
            foreach ($buckets as $bucket) {
                $remainingVolume = max(0, $bucket->volume - $bucket->balls->sum('volume'));
                $ballsToPlace = min($remainingVolume / $balls->where('name', $ballName)->first()->volume, $ballCount);

                // If there is enough space in the bucket, place the balls
                if ($ballsToPlace > 0) {
                    $bucket->balls()->createMany(array_fill(0, $ballsToPlace, ['name' => $ballName]));
                    $ballCount -= $ballsToPlace;
                }

                // Break if all balls are placed
                if ($ballCount <= 0) {
                    break;
                }
            }
        }

        // Create the result message
        $resultMessage = "Following are the suggested buckets:\n";
        foreach ($buckets as $bucket) {
            $resultMessage .= "Bucket {$bucket->name} : ";
            $resultMessage .= "{$bucket->balls->count()} {$ballName} Balls, ";
        }

        return response()->json(['message' => $resultMessage]);
    }

}
