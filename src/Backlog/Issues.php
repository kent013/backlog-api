<?php

namespace Itigoppo\BacklogApi\Backlog;

use Itigoppo\BacklogApi\Connector\Connector;

class Issues
{
    protected $connector;

    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * 課題一覧の取得
     *
     * @param  array  $query_options
     * @return mixed|string
     */
    public function load(array $query_options = [])
    {
        $query_params = [
            ] + $query_options;

        return $this->connector->get('issues', [], $query_params);
    }

    /**
     * 課題数の取得
     *
     * @param  array  $query_options
     * @return mixed|string
     */
    public function count(array $query_options = [])
    {
        $query_params = [
            ] + $query_options;

        return $this->connector->get('issues/count', [], $query_params);
    }

    /**
     * 課題の追加
     *
     * @param  int  $project_id
     * @param  string  $summary
     * @param  int  $issue_type_id
     * @param  int  $priority_id
     * @param  array  $form_options
     * @return mixed|string
     */
    public function create(int $project_id, string $summary, int $issue_type_id, int $priority_id, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
                'projectId' => $project_id,
                'summary' => $summary,
                'issueTypeId' => $issue_type_id,
                'priorityId' => $priority_id,
            ] + $form_options;

        return $this->connector->post('issues', $form_params, [], $headers);
    }

    /**
     * 課題情報の取得
     *
     * @param  string  $issues_id_or_key
     * @return mixed|string
     */
    public function find(string $issues_id_or_key)
    {
        return $this->connector->get(sprintf('issues/%s', $issues_id_or_key));
    }

    /**
     * 課題情報の更新
     *
     * @param  string  $issues_id_or_key
     * @param  array  $form_options
     * @return mixed|string
     */
    public function update(string $issues_id_or_key, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            ] + $form_options;

        return $this->connector->patch(sprintf('issues/%s', $issues_id_or_key), $form_params, [], $headers);
    }

    /**
     * 課題の削除
     *
     * @param  string  $issues_id_or_key
     * @return mixed|string
     */
    public function delete(string $issues_id_or_key)
    {
        return $this->connector->delete(sprintf('issues/%s', $issues_id_or_key));
    }

    /**
     * 課題コメントの取得
     *
     * @param  string  $issues_id_or_key
     * @param  array  $query_options
     * @return mixed|string
     */
    public function comments(string $issues_id_or_key, array $query_options = [])
    {
        $query_params = [
            ] + $query_options;

        return $this->connector->get(sprintf('issues/%s/comments', $issues_id_or_key), [], $query_params);
    }

    /**
     * 課題コメントの追加
     *
     * @param  string  $issues_id_or_key
     * @param  string  $content
     * @param  array  $form_options
     * @return mixed|string
     */
    public function createComment(string $issues_id_or_key, string $content, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
                'content' => $content,
            ] + $form_options;

        return $this->connector->post(sprintf('issues/%s/comments', $issues_id_or_key), $form_params, [], $headers);
    }

    /**
     * 課題コメント数の取得
     *
     * @param  string  $issues_id_or_key
     * @return mixed|string
     */
    public function numberOfComments(string $issues_id_or_key)
    {
        return $this->connector->get(sprintf('issues/%s/comments/count', $issues_id_or_key));
    }

    /**
     * 課題コメント情報の取得
     *
     * @param  string  $issues_id_or_key
     * @param  int  $comment_id
     * @return mixed|string
     */
    public function findComment(string $issues_id_or_key, int $comment_id)
    {
        return $this->connector->get(sprintf('issues/%s/comments/%s', $issues_id_or_key, $comment_id));
    }

    /**
     * 課題コメント情報の更新
     *
     * @param  string  $issues_id_or_key
     * @param  int  $comment_id
     * @param  array  $form_options
     * @return mixed|string
     */
    public function updateComment(string $issues_id_or_key, int $comment_id, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            ] + $form_options;

        return $this->connector->patch(
            sprintf(
                'issues/%s/comments/%d',
                $issues_id_or_key,
                $comment_id
            ),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * 課題コメントのお知らせ一覧の取得
     *
     * @param  string  $issues_id_or_key
     * @param  int  $comment_id
     * @return mixed|string
     */
    public function commentNotifications(string $issues_id_or_key, int $comment_id)
    {
        return $this->connector->get(sprintf('issues/%s/comments/%s/notifications', $issues_id_or_key, $comment_id));
    }

    /**
     * 課題コメントにお知らせを追加
     *
     * @param  string  $issues_id_or_key
     * @param  int  $comment_id
     * @param  array  $form_options
     * @return mixed|string
     */
    public function createCommentNotification(string $issues_id_or_key, int $comment_id, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            ] + $form_options;

        return $this->connector->post(
            sprintf(
                'issues/%s/comments/%s/notifications',
                $issues_id_or_key,
                $comment_id
            ),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * 課題添付ファイル一覧の取得
     *
     * @param  string  $issues_id_or_key
     * @return mixed|string
     */
    public function attachments(string $issues_id_or_key)
    {
        return $this->connector->get(sprintf('issues/%s/attachments', $issues_id_or_key));
    }

    /**
     * Get Issue Attachment
     * @api https://developer.nulab.com/docs/backlog/api/2/get-issue-attachment/
     *
     * @param  string  $issues_id_or_key
     * @param  string  $attachment_id
     * @return \GuzzleHttp\Psr7\Response
     */
    public function attachment(string $issues_id_or_key, string $attachment_id): \GuzzleHttp\Psr7\Response
    {
        return $this->connector->getFile(sprintf('issues/%s/attachments/%s', $issues_id_or_key, $attachment_id));
    }

    /**
     * 課題共有ファイル一覧の取得
     *
     * @param  string  $issues_id_or_key
     * @return mixed|string
     */
    public function sharedFiles(string $issues_id_or_key)
    {
        return $this->connector->get(sprintf('issues/%s/sharedFiles', $issues_id_or_key));
    }
}
