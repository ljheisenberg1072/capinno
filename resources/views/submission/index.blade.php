@extends('layouts.app')
@section('title', '作品提交说明')

@section('content')
    <section class="submission-format">
    <div class="container">
        <div class="row mt-100 mb-100 justify-content-center">
            <div class="col-lg-12 mb-5">
                <div class="text-center">
                    <h2>作品格式说明</h2>
                </div>
            </div>
            <div class="row col-lg-4 col-8 justify-content-center mb-4">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-12 title">
                            <h4>报告文档</h4>
                        </div>
                        <div class="col-lg-12 content">
                            <p>PDF格式，单个不超过20M</p>
                            <p>报告类文档附上大赛logo水印</p>
                            <p><a href="#"><img src="/images/capinno_logo.png" alt="" width="150"></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-lg-4 col-8 justify-content-center mb-4">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-12 title">
                            <h4>图片文件</h4>
                        </div>
                        <div class="col-lg-12 content">
                            <p>宣传海报和展示文件</p>
                            <p>单词上传不可超过6张图片</p>
                            <p>单个不超过20M</p>
                            <p>附上大赛logo水印展示</p>
                            <p>文件尺寸以后期通知为准</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-lg-4 col-8 justify-content-center mb-4">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-12 title">
                            <h4>视频文件</h4>
                        </div>
                        <div class="col-lg-12 content">
                            <p>格式：MP4或AVI格式</p>
                            <p>尺寸：显示比例为16:9（视频尺寸16:9为正常显示）</p>
                            <p>作品演示视频：单个不超过50M，时限不超过3分钟</p>
                            <p>内容传播视频：单个不超过100M，时限不超过8分钟</p>
                            <p>视频从头到尾统一添加大赛logo</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-lg-12 justify-content-center">
                <p>备注：赛事时间需根据实际运作情况可能会有微调，请紧密关注大赛官网及相关通知渠道。</p>
                <p>如有疑问请随时联系大赛组委会。</p>
            </div>
        </div>
    </div>
</section>
    <section class="submission-schedule" style="background-image: url('/images/category/background.png')">
        <div class="container">
            <div class="row">
                <div class="col-12 my-5">
                    <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-begin-tab" data-toggle="pill" href="#pills-begin" role="tab" aria-controls="pills-begin" aria-selected="true">初赛</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-semi-tab" data-toggle="pill" href="#pills-semi" role="tab" aria-controls="pills-semi" aria-selected="false">复赛</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-final-tab" data-toggle="pill" href="#pills-final" role="tab" aria-controls="pills-final" aria-selected="false">决赛答辩</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-job-tab" data-toggle="pill" href="#pills-job" role="tab" aria-controls="pills-job" aria-selected="false">创业面试</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-business-tab" data-toggle="pill" href="#pills-business" role="tab" aria-controls="pills-business" aria-selected="false">商业路演(总决赛)</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-begin" role="tabpanel" aria-labelledby="pills-begin-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 text-center mb-5">
                                    <h4>初赛作品文档提交要求</h4>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">序号</th>
                                            <th scope="col">内容</th>
                                            <th scope="col">格式</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>需求分析报告</td>
                                            <td>PDF</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>设计创新提案</td>
                                            <td>PDF</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <p>报名时间：2019年7月23日~9月15日</p>
                                    <p>报名费用：免费</p>
                                    <p>报名方式：大赛官网</p>
                                    <p>文件提交截止时间：2019年10月13日 23:59</p>
                                    <p>评审时间：2019年10月14日~10月27日</p>
                                    <p>结果公布时间：2019年10月28日</p>
                                    <p>初赛模板文件下载<a href="#"><i class="iconfont icon-icclouddownload"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-semi" role="tabpanel" aria-labelledby="pills-semi-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 text-center mb-5">
                                    <h4>复赛作品文档提交要求</h4>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">序号</th>
                                            <th scope="col">内容</th>
                                            <th scope="col">备注</th>
                                            <th scope="col">格式</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>需求分析报告</td>
                                            <td>根据评委反馈进行修改</td>
                                            <td>PDF</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>产品商业计划书</td>
                                            <td></td>
                                            <td>PDF</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>品牌设计&产品效果图</td>
                                            <td></td>
                                            <td>PDF</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>上市推广海报</td>
                                            <td></td>
                                            <td>JPG/PNG</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>商品详情页面（长图）</td>
                                            <td></td>
                                            <td>JPG/PNG</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>样品提交</td>
                                            <td>寄送地址见模板下载链接</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>视频文件（建议提交）</td>
                                            <td>非“必交文件”</td>
                                            <td>MP4</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <p>文件提交截止时间：2019年12月29日 23:59</p>
                                    <p>评审时间：2019年12月30日~2020年1月5日</p>
                                    <p>结果公布时间：2020年1月6日</p>
                                    <p>补充说明：</p>
                                    <p>参加复赛的团队必须向组委会提交至少3分质量稳定的样品，邮寄时间以到达时间为准，邮寄地址请查看提交文件模板链接</p>
                                    <p>复赛模板文件下载<a href="#"><i class="iconfont icon-icclouddownload"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-final" role="tabpanel" aria-labelledby="pills-final-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 text-center mb-5">
                                    <h4>决赛作品文档提交要求</h4>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">序号</th>
                                            <th scope="col">内容</th>
                                            <th scope="col">备注</th>
                                            <th scope="col">格式</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>需求分析报告（优化）</td>
                                            <td>自行确定修改程度</td>
                                            <td>PDF</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>产品商业计划书（优化）</td>
                                            <td>自行确定修改程度</td>
                                            <td>PDF</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>设计源文件/建模源文件</td>
                                            <td>大小不超过200M</td>
                                            <td>ZIP/RAR</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>作品简报</td>
                                            <td>A4大小</td>
                                            <td>JPG/PNG</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>答辩阐述报告</td>
                                            <td></td>
                                            <td>PDF</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>视频文件（建议提交）</td>
                                            <td>非“必交文件”</td>
                                            <td>MP4</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <p>文件提交截止时间：2020年1月10日 23:59</p>
                                    <p>评审时间：暂定2020年1月10日</p>
                                    <p>结果公布时间：暂定2020年1月10日</p>
                                    <p>补充说明：</p>
                                    <p>进入决赛现场答辩的团队需向组委会提供15份质量稳定的样品以供评审品尝，若团队成员不能到达现场答辩，可委派指定人员参加现场答辩环节，具体要求请根据大赛后期文件为准。</p>
                                    <p>决赛模板文件下载<a href="#"><i class="iconfont icon-icclouddownload"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 text-center mb-5">
                                    <h4>创业面试</h4>
                                    <p class="mt-3">暂定2020年1月11日</p>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <p><img src="/images/news.png" alt="" width="100%"></p>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <p><img src="/images/news.png" alt="" width="100%"></p>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <p><img src="/images/news.png" alt="" width="100%"></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-business" role="tabpanel" aria-labelledby="pills-business-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 text-center mb-5">
                                    <h4>商业路演（总决赛）</h4>
                                    <p class="mt-3">FBIC2020 全球食品饮料创新大会现场路演</p>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <p><img src="/images/news.png" alt="" width="100%"></p>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <p><img src="/images/news.png" alt="" width="100%"></p>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <p><img src="/images/news.png" alt="" width="100%"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
